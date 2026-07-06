#Importa las clases necesarias para crear el panel de administración
from sqladmin import Admin, ModelView
    #sqladmin-> librería de Python que que genera automáticamente un panel de control para administrar la base de datos.
    #Admin-> clase que representa el panel de administración.
    #ModelView-> clase que representa una sola tabla de la base de datos y permite definir cómo se mostrará en el panel.

#Importa la aplicación ASGI de Starlette
from starlette.applications import Starlette
    #Starlette-> Crea la aplicación web que servirá el panel de administración.

#Importa la función para crear la conexión con la base de datos
from sqlalchemy import create_engine
    #El Engine es el encargado de hablar con PostgreSQL.

#Importa todos los modelos de la base de datos (importación de las clases que representan las tablas de la base de datos)
from models.asignacion import Asignacion
from models.axente import Axente
from models.cliente import Cliente
from models.contacto import Contacto
from models.historial import Historial
from models.prospeccion import Prospeccion


# ============================================================
# CONEXIÓN A LA BASE DE DATOS
# ============================================================

# Crea la conexión con la base de datos PostgreSQL usando SQLAlchemy.
engine = create_engine( #crea un objeto Engine que representa la conexión a la base de datos.
    "postgresql+psycopg://postgres:abc123@localhost:5432/crm"
)


# ============================================================
# CREACIÓN DE LA APLICACIÓN WEB
# ============================================================

# Crea la aplicación Starlette.
app = Starlette() #crea una instancia de la clase Starlette, que representa la aplicación web que servirá el panel de administración.

# Se une la aplicacion Starlette con el panel de administración SQLAdmin, usando la conexión a la base de datos creada anteriormente.
admin = Admin(app, engine)


# ============================================================
# ADMINISTRACIÓN DE LA TABLA ASIGNACION
# ============================================================

class AsignacionAdmin(ModelView, model=Asignacion):
    name = "Asignación"
    name_plural = "Asignaciones"
    # Define las columnas que se mostrarán en la tabla del panel.
    column_list = [
        Asignacion.id_contacto,
        Asignacion.contacto,
        Asignacion.id_axente,
        Asignacion.axente,
    ]
    #Nombre de las columnas que se mostrarán en el panel de administración.
    column_labels = {
        Asignacion.id_contacto: "ID Contacto",
        Asignacion.contacto: "Nombre contacto",
        Asignacion.id_axente: "ID Agente",
        Asignacion.axente: "Nombre agente",
    }
# Registra la vista en el panel de administración.
admin.add_view(AsignacionAdmin)


# ============================================================
# ADMINISTRACIÓN DE LA TABLA AXENTE
# ============================================================

class AxenteAdmin(ModelView, model=Axente):
    name = "Agente"
    name_plural = "Agentes"
    # Columnas visibles en la tabla de agentes.
    column_list = [
        Axente.id_axente,
        Axente.nome,
        Axente.telefono,
        Axente.email,
    ]

admin.add_view(AxenteAdmin)


# ============================================================
# ADMINISTRACIÓN DE LA TABLA CLIENTE
# ============================================================

class ClienteAdmin(ModelView, model=Cliente):
    name = "Cliente"
    name_plural = "Clientes"

    # Muestra el identificador del cliente y la fecha de conversión.
    column_list = [
        Cliente.id_cliente,
        Cliente.fech_conversion,
    ]

admin.add_view(ClienteAdmin)


# ============================================================
# ADMINISTRACIÓN DE LA TABLA CONTACTO
# ============================================================

class ContactoAdmin(ModelView, model=Contacto):
    name = "Contacto"
    name_plural = "Contactos"

    # Columnas visibles para los contactos.
    column_list = [
        Contacto.id_contacto,
        Contacto.nome,
        Contacto.enderezo,
        Contacto.telefono,
        Contacto.email,
        Contacto.notas,
    ]

admin.add_view(ContactoAdmin)


# ============================================================
# ADMINISTRACIÓN DE LA TABLA HISTORIAL
# ============================================================

class HistorialAdmin(ModelView, model=Historial):

    name = "Historial"
    name_plural = "Historiales"

    # Muestra toda la información relevante del historial de un contacto.
    column_list = [
        Historial.id_historial,
        Historial.id_contacto,
        Historial.marca_temporal,
        Historial.probabilidade_conversion,
        Historial.observacions,
    ]
# Registra la vista en el panel de administración
admin.add_view(HistorialAdmin)


# ============================================================
# ADMINISTRACIÓN DE LA TABLA PROSPECCION
# ============================================================

class ProspeccionAdmin(ModelView, model=Prospeccion):
    name = "Prospección"
    name_plural = "Prospecciones"
    # Columnas visibles para el seguimiento de las prospecciones.
    column_list = [
        Prospeccion.id_prospeccion,
        Prospeccion.captacion,
        Prospeccion.peche,
        Prospeccion.aceptado,
        Prospeccion.motivo
    ]

admin.add_view(ProspeccionAdmin)