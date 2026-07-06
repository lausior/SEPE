# Importa los tipos de columnas que se utilizarán en el modelo.
from sqlalchemy import Column, Integer, ForeignKey

# Importa relationship, que permite crear relaciones entre modelos.
from sqlalchemy.orm import relationship

# Importa la clase Base de la que heredarán todos los modelos.
from database import Base


# Define el modelo Asignacion.
# Este modelo representa la tabla "asignacion" de la base de datos.
class Asignacion(Base):
    # Nombre de la tabla en PostgreSQL.
    __tablename__ = "asignacion"

    # Columna id_contacto:
    # - Es de tipo entero.
    # - Es una clave foránea que referencia a contacto.id_contacto.
    # - Forma parte de la clave primaria compuesta.
    id_contacto = Column(
        Integer,
        ForeignKey("contacto.id_contacto"),
        primary_key=True
    )

    # Columna id_axente:
    # - Es de tipo entero.
    # - Es una clave foránea que referencia a axente.id_axente.
    # - Forma parte de la clave primaria compuesta.
    id_axente = Column(
        Integer,
        ForeignKey("axente.id_axente"),
        primary_key=True
    )

    # Relación con el modelo Contacto.
    # Permite acceder directamente al objeto Contacto relacionado
    # sin necesidad de realizar consultas manuales.
    contacto = relationship("Contacto")

    # Relación con el modelo Axente.
    # Permite acceder directamente al objeto Axente relacionado.
    axente = relationship("Axente")