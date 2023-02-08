<?php


namespace App\Views\Components;

class Notification
{
    /**
     * Displays a notification to the user
     *
     * @param string $message    The message to display in the notification
     * @param string|bool $type  Specifies the type of notification: "error" or "success"
     * @return void
     */
    public function displayHeaderNotification(string $message, $type = 'success'): void
    {
        $backgroundColor = 'black';
        $textColor = 'white';
        if ($type === 'error') {
            $backgroundColor = 'red';
            $textColor = 'white';
        }

        echo "<div style='position:sticky;top:0;width:100%;background:{$backgroundColor};color:{$textColor};text-align:center;padding:10px 10px;' class='header-notification'>
            $message
        </div>";
    }

    /**
     * Displays errors
     *
     * The CSS class of the container for all errors is "error-notifications"
     *
     * The class of each "div" element containing an error is "error-notification"
     *
     * @param array $errors An array of errors to display
     * @return void
     */
    public function displayErrors(array $errors): void
    {
        echo "<div class='error-notifications'>";
        foreach ($errors as $error) {
            echo "<div class='error-notification'>" . $error . "</div>";
        }
        echo "</div>";

        echo '<script>
        error_animation();
        </script>';
    }
}
