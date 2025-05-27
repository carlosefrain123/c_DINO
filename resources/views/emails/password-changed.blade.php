@component('mail::message')
# Hola {{ $name }},

Queremos informarte que tu contraseña en **DINO S.R.L** ha sido cambiada con éxito.

Si **NO realizaste este cambio**, por favor **restablece tu contraseña inmediatamente** para proteger tu cuenta.

@component('mail::button', ['url' => url('forgot-password')])
Restablecer Contraseña
@endcomponent

Si realizaste este cambio, puedes ignorar este mensaje.
Si tienes dudas, contáctanos en **{{ $support_email }}**.

Gracias,
**El equipo de DINO S.R.L**
@endcomponent
