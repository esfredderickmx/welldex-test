# Gestión de Operaciones Aduanales

Este proyecto tiene como objetivo gestionar operaciones aduanales relacionadas con importaciones. Se proporciona un conjunto de conceptos que pueden ser clases o atributos al momento de generar una operación y que están relacionados con la misma.

## Conceptos

- **Importación**: Una operación donde un cliente desea ingresar mercancía al país.
- **Referencia**: Folio, llave o clave que identifica una importación.
- **BL (Bill of Lading)**: Folio del documento que demuestra que hay un contrato de transporte entre un cliente importador y una naviera.
- **Cliente**: Persona o empresa que realiza la importación.
- **Expedidor/Exportador/Proveedor**: Nombre del exportador de la mercancía.
- **Destinatario/Receptor**: Nombre del destinatario de la mercancía.
- **Persona Física o Jurídica a Notificar**: Persona o empresa a la que se debe notificar sobre la llegada de la mercancía.
- **País de Exportación**: País de origen de la mercancía.
- **Puerto de Embarque/Zarpe**: Puerto de origen de la mercancía.
- **Puerto de Desembarque/Descarga**: Puerto de destino de la mercancía.
- **Aduana de Ingreso**: Número de aduana correspondiente al lugar de ingreso de la mercancía.
- **País de Destino**: País al que se dirige la mercancía.
- **Mercancía**: Descripción detallada de la mercancía, incluyendo peso bruto, volumen, número de bultos, número de unidades, dimensiones, marcas y tipo de embalaje (cajas, carga suelta, etc.).
- **Estatus**: Estado actual de la operación (Alta, En espera de Zarpe, En Trayecto, En Atraque, Descargó, Descargada).
- **Buque**: Nombre del buque que transporta la mercancía.
- **Compañía Naviera**: Nombre de la compañía naviera que realiza el transporte.
- **Fechas de Zarpe y Arribo**: Fechas de salida y llegada del buque.
- **Flete**: Costo del transporte y forma de pago.
- **País de Origen de la Mercancía**: País de origen de la mercancía.
- **Ciudad de Entrega**: Ciudad donde se entregará la mercancía.
- **Número de Booking**: Número de reserva de espacio para el envío proporcionado por la naviera.
- **Terminal Marítima**: Terminal marítima en la que se cargará la mercancía en el puerto de origen.
- **Recargos**: Recargos aplicados (por manipulación en la terminal, por demora, por utilización de espacio, etc.).

## Clases y Métodos

Se deben crear las siguientes clases con sus respectivos métodos:

- `Operación de importacion`: Clase para gestionar las operaciones de importación.
- `Exportador`: Clase para gestionar los datos del exportador.
- `Operador`: Clase para gestionar los datos del operador.
- `Mercancia`: Clase para gestionar los datos de la mercancía.
- `Buque`: Clase para gestionar los datos del buque.
- `Naviera`: Clase para gestionar los datos de la naviera.
- `Terminal`: Clase para gestionar los datos de la terminal.
- `Importador`: Clase para gestionar los datos del importador.

Los métodos necesarios para la captura de cada una de las clases y para dar de alta una operación de importación deben ser implementados.

Se debe incluir un método para consultar las operaciones dadas de alta a partir de la referencia (folio) y otro método para cambiar el estatus de una operación, asegurando que el estatus solo puede avanzar progresivamente.

## Datos Adicionales

Se sugiere incluir datos de localización (domicilio, teléfono, país, estado, etc.) en las clases según sea necesario, aunque no estén mencionados en los conceptos proporcionados.

## Consideraciones Adicionales

Se deja a consideración del desarrollador el manejo de base de datos y la estructura del proyecto (vistas, controladores, modelos, API, etc.). Se sugiere separar por capas para una mejor organización y escalabilidad del sistema.
