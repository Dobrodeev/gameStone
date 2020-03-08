<?

// Листинг 11.23

  if (! $isvalid) {
      Notifier::mailWarning(
        $user,
        $ip,
        $this->getStatus()
      );
  }

?>
