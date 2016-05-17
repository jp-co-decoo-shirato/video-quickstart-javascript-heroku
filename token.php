<?php
require_once('/path/to/twilio-php/Services/Twilio.php'); // Loads the library

// Substitute the following values using the details from your Twilio Account
$accountSid = ACCOUNT_SID;
$apiKeySid = API_KEY_SID;
$apiKeySecret = API_KEY_SECRET;
$configurationProfileSid = CONFIGURATION_PROFILE_SID;

// Create an Access Token
$token = new Services_Twilio_AccessToken(
    $accountSid,
    $apiKeySid,
    $apiKeySecret,
    $ttl=3600,
    $identity='example-user'
);

// Grant access to Conversations
$grant = new Services_Twilio_Auth_ConversationsGrant();
$grant->setConfigurationProfileSid($configurationProfileSid);
$token->addGrant($grant);

// Serialize the token as a JWT
echo $token->toJWT();
