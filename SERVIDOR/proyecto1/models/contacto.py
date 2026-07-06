from sqlalchemy import Column, Integer, String
from database import Base


class Contacto(Base):
    __tablename__ = "contacto"

    id_contacto = Column(Integer, primary_key=True)
    nome = Column(String(100), nullable=False)
    enderezo = Column(String(100))
    telefono = Column(String(20), nullable=False)
    email = Column(String(50), nullable=False)
    notas = Column(String(100))

    def __str__(self):
        return self.nome

