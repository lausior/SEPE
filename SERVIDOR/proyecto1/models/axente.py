from sqlalchemy import Column, Integer, String
from database import Base

class Axente(Base):
    __tablename__ = "axente"

    id_axente = Column(Integer, primary_key=True)
    nome = Column(String(100), nullable=False)
    telefono = Column(String(20), nullable=False)
    email = Column(String(50), nullable=False)

    def __str__(self):
        return self.nome