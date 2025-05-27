@component('mail::message')
# ¡Bienvenido a DINO S.R.L., {{ $name }}! 🛒🎉

Gracias por unirte a nuestra comunidad. En nuestra tienda virtual encontrarás una gran variedad de productos de calidad pensados para satisfacer todas tus necesidades.

@component('mail::button', ['url' => url('/')])
Explorar Productos
@endcomponent

Si tienes alguna duda o consulta, no dudes en escribirnos. ¡Estamos aquí para ayudarte!

Saludos cordiales,
**El equipo de DINO S.R.L.**
@endcomponent
