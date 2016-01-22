<?php
require '../../core/Form.php';
require '../../core/Hash.php';
require '../util/Token.php';

if (isset($_REQUEST['run'])) {
    try {
        $form = new Form();

        $form->post('name')
                ->val('minlength', 2)
                ->post('age')
                ->val('minlength', 2)
                ->val('digit')
                ->post('gender')
                ->post('token')
                ->post('remember');

        $form->submit();
        echo 'Form passed';
        $data = $form->fetch();

        if (!isset($_SESSION['fToken']) && $_SESSION['fToken'] != $data['token']) {
            exit;
        }
        echo '<pre>';
        print_r($data);
        print 'Remember: ' . boolval($data['remember']);
        echo '</pre>';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$token = $_SESSION['fToken'] = Token::create('form');
?>
<form method="post" action="?run">
    Name <input type="text" name="name"/>
    Age <input type="text" name="age"/>
    Gender <select name="gender">
        <option value="m">male</option>
        <option value="f">female</option>
    </select>
    <input name="remember" type="checkbox" value="Remember Me" />
    <input name="token" type="hidden" value="<?php echo $token; ?>"/>
    <button type="submit">Submit</button>
</form>