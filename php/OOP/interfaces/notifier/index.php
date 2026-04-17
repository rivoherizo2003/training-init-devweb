<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <div class="notifier-container">
            <h2>Formulaire de notification</h2>
            <form action="notifier_handler.php" method="post">
                <div class="form-row">
                    <label for="phone-number">Phone number:</label>
                    <input type="tel" class="form-control" name="phone-number" value="033 15 456 45" id="">
                </div>

                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="rakoto@topinfo.com" id="">
                </div>

                <div class="form-row">
                    <label for="message-content">Contenu du message:</label>
                    <textarea name="message-content" id="" class="form-control" rows="10">Hello,
Voici mon message

Cordialement,
            </textarea>
                </div>

                <div class="form-row">
                    <div class="form-check">
                        <input type="radio" name="notifier-provider" checked value="EMAIL" id="email-radio">
                        <label for="email-radio">Email</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="notifier-provider" value="SMS" id="sms-radio">
                        <label for="sms-radio">Sms</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="notifier-provider" value="LINKEDIN" id="linkedin-radio">
                        <label for="linkedin-radio">Linkedin</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="notifier-provider" value="FACEBOOK" id="facebook-radio">
                        <label for="facebook-radio">Facebook</label>
                    </div>
                </div>

                <div class="form-row">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>