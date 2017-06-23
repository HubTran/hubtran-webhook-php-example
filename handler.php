<?php
  // Bare-bones self-contained example of how to handle a webhook in PHP
  $input = file_get_contents('php://input');
  $webhook = json_decode($input, true);

  // Check to make sure the person hitting the webhook has at least
  // some kind of privileged information.
  if ($_GET['token'] != 'sekret') {
    header(':', true, 401);
    echo json_encode(array("response" => "Unauthorized"));
    return;
  }
  // We send payloads for approved, exception, and processed events. It's
  // best to explicitly select which ones you care about
  if ($webhook['event']['type'] == 'approved') {
    $number = $webhook['event']['invoice']['number'];
    $response = "Invoice " . $number . " was approved, got it. Thanks!";
    header(':', true, 200);
    echo json_encode(array("response" => $response));
  } else {
    header(':', true, 200);
    echo json_encode(array("response" => "Ignoring because it's not 'approved'"));
  }
?>
