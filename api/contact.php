<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

header('Content-Type: application/json; charset=UTF-8');

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config/site.php';
$locale = (string) ($_POST['locale'] ?? 'de');
$messages = [
    'de' => [
        'method' => 'Ungültige Anfrage.',
        'spam' => 'Die Anfrage wurde blockiert.',
        'required' => 'Bitte füllen Sie alle Pflichtfelder aus.',
        'contact' => 'Bitte geben Sie eine E-Mail-Adresse oder Telefonnummer an.',
        'message' => 'Bitte beschreiben Sie Ihr Anliegen etwas genauer.',
        'failed' => 'Die Anfrage konnte nicht gesendet werden. Bitte versuchen Sie es erneut.',
        'success' => 'Vielen Dank. Ihre Anfrage wurde erfolgreich gesendet.',
    ],
    'pt' => [
        'method' => 'Pedido inválido.',
        'spam' => 'O pedido foi bloqueado.',
        'required' => 'Preencha todos os campos obrigatórios.',
        'contact' => 'Indique um e-mail ou número de telefone válido.',
        'message' => 'Descreva o pedido com um pouco mais de detalhe.',
        'failed' => 'Não foi possível enviar o pedido. Tente novamente.',
        'success' => 'Obrigado. O seu pedido foi enviado com sucesso.',
    ],
    'en' => [
        'method' => 'Invalid request.',
        'spam' => 'The request was blocked.',
        'required' => 'Please fill in all required fields.',
        'contact' => 'Please provide a valid email address or phone number.',
        'message' => 'Please describe your request in a bit more detail.',
        'failed' => 'The request could not be sent. Please try again.',
        'success' => 'Thank you. Your request was sent successfully.',
    ],
    'fr' => [
        'method' => 'Requête invalide.',
        'spam' => 'La demande a été bloquée.',
        'required' => 'Veuillez remplir tous les champs obligatoires.',
        'contact' => 'Veuillez indiquer une adresse e-mail ou un numéro de téléphone valide.',
        'message' => 'Veuillez décrire votre demande avec un peu plus de détails.',
        'failed' => 'La demande n’a pas pu être envoyée. Veuillez réessayer.',
        'success' => 'Merci. Votre demande a bien été envoyée.',
    ],
];

$copy = $messages[$locale] ?? $messages['de'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, false, $copy['method']);
}

$name = normalize($_POST['name'] ?? '', 120);
$contact = normalize($_POST['contact'] ?? '', 160);
$service = normalize($_POST['service'] ?? '', 160);
$message = normalize($_POST['message'] ?? '', 2000);
$honeypot = trim((string) ($_POST['company'] ?? ''));
$fieldErrors = [];

if ($honeypot !== '') {
    respond(400, false, $copy['spam']);
}

if ($name === '' || $contact === '' || $service === '' || $message === '') {
    if ($name === '') {
        $fieldErrors['name'] = $copy['required'];
    }

    if ($contact === '') {
        $fieldErrors['contact'] = $copy['required'];
    }

    if ($service === '') {
        $fieldErrors['service'] = $copy['required'];
    }

    if ($message === '') {
        $fieldErrors['message'] = $copy['required'];
    }

    respond(422, false, $copy['required'], $fieldErrors);
}

if (! isValidContact($contact)) {
    $fieldErrors['contact'] = $copy['contact'];
}

if (stringLength($message) < 12 || isSuspicious($message)) {
    $fieldErrors['message'] = $copy['message'];
}

if ($fieldErrors !== []) {
    respond(422, false, $copy['failed'], $fieldErrors);
}

$body = implode(PHP_EOL, [
    'Neue Anfrage / Novo pedido',
    '---------------------------',
    'Name: ' . $name,
    'Kontakt: ' . $contact,
    'Dienstleistung / Serviço: ' . $service,
    'Sprache / Idioma: ' . $locale,
    '',
    'Nachricht / Mensagem:',
    $message,
]);

try {
    $mail = new PHPMailer(true);
    $mail->isMail();
    $mail->CharSet = 'UTF-8';
    $mail->setFrom((string) $config['default_from']['email'], (string) $config['default_from']['name']);
    $mail->Sender = (string) $config['default_from']['email'];
    $mail->addAddress((string) $config['destination_email'], (string) $config['company_name']);

    if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
        $mail->addReplyTo($contact, $name);
    }

    $mail->Subject = match ($locale) {
        'pt' => 'Novo pedido do site - ' . $service,
        'en' => 'New website request - ' . $service,
        'fr' => 'Nouvelle demande du site - ' . $service,
        default => 'Neue Website-Anfrage - ' . $service,
    };
    $mail->Body = $body;
    $mail->AltBody = $body;
    $mail->send();
} catch (Exception $exception) {
    respond(500, false, $copy['failed']);
}

respond(200, true, $copy['success']);

function normalize(mixed $value, int $maxLength): string
{
    $text = trim((string) $value);
    $text = preg_replace('/\s+/u', ' ', $text) ?? $text;

    if (function_exists('mb_substr')) {
        return mb_substr($text, 0, $maxLength);
    }

    return substr($text, 0, $maxLength);
}

function isValidContact(string $contact): bool
{
    if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    $digits = preg_replace('/\D+/', '', $contact) ?? '';

    return strlen($digits) >= 7;
}

function isSuspicious(string $message): bool
{
    if (substr_count(strtolower($message), 'http') > 1) {
        return true;
    }

    if (preg_match('/(.)\1{7,}/u', $message) === 1) {
        return true;
    }

    return false;
}

function stringLength(string $value): int
{
    if (function_exists('mb_strlen')) {
        return mb_strlen($value);
    }

    return strlen($value);
}

function respond(int $status, bool $ok, string $message, array $fieldErrors = []): never
{
    http_response_code($status);
    echo json_encode([
        'ok' => $ok,
        'message' => $message,
        'fieldErrors' => $fieldErrors,
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}
