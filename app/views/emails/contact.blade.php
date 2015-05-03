<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contacto Malarrimo</title>

    {{ HTML::style('css/email.css') }}

</head>

<body bgcolor="#FFFFFF">


<!-- BODY -->
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <div class="content">
                <table>
                    <tr>
                        <td>
                            <h3>Contacto Malarrimo</h3>
                            <p class="lead callout">Hemos recibido un mensaje a traves del formulario de contacto en <a href="http://malarrimo.com/contacto" target="_blank">malarrimo.com</a></p>

                            <table class="social" width="100%">
                                <tr>
                                    <td>

                                        <table align="left" class="column">
                                            <tr>
                                                <td><h5 class="">Nombre:</h5></td>
                                                <td><p>{{ $name }}</p></td>
                                            </tr>
                                            <tr>
                                                <td><h5 class="">Email:</h5></td>
                                                <td><p>{{ $email }}</p></td>
                                            </tr>
                                            <tr>
                                                <td><h5 class="">Mensaje:</h5></td>
                                                <td><p>{{ $messageBody }}</p></td>
                                            </tr>
                                        </table>

                                        <span class="clear"></span>

                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </div><!-- /content -->

        </td>
        <td></td>
    </tr>
</table><!-- /BODY -->

</body>
</html>