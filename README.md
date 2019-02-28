# Code Challenge - Backend

Hola,

Antes de nada, agradecerte dedicar parte de tu tiempo a la realización de este pequeña prueba técnica.

# Enunciado

Imaginemos que un cliente solicita el envío de un pedido mediante una llamada a la API REST para almacenarlo en la base de datos.

El pedido debe contener:

- Nombre y apellidos del cliente
- Email (Único por cliente)
- Teléfono
- Dirección de entrega (solo puede existir una por pedido)
- Fecha de entrega
- Franja de hora seleccionada para la entrega (variable, pueden ser desde franjas de 1h hasta de 8h)

Una vez tenemos guardada la información del pedido, debe asignarse a un driver que tengamos dado de alta en el sistema de forma aleatoria.

Por otro lado, nuestros drivers mediante su aplicación, necesitan obtener el listado de tareas para completar en el día. Es necesario contar con un endpoint que reciba como parámetro el ID del driver y la fecha de los pedidos que queremos obtener y nos devuelva un JSON con el listado.

# TODO
- Arquitectura de aplicación en Laravel
- Construir el modelo de datos en MYSQL con todas las entidades y relaciones
- Endpoint para persistir el pedido en BD
- Endpoint para mostrar los pedidos a entregar por los drivers

# Evaluable
- Diseño modelado de datos
- API REST con sus endpoints
- Arquitectura de aplicación en Laravel
- Utilización del ORM
- Uso de buenas prácticas
- Patrones de diseño utilizados
- Optimización del performance

# Workflow
- Haz un fork de este repositorio.
- Resuelve el ejercicio.
- Comparte tu fork para la corrección (Reporter access)

Si tienes alguna duda, puedes contactar con nosotros en `tech@letsgoi.com`

Muchas gracias y suerte.
