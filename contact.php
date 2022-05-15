<form action="submit_contact.php" method="POST">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="message">Votre message</label>
        <textarea placeholder="Exprimez vous" name="message"></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>