from sqlalchemy import *
from sqlalchemy.orm import declarative_base

class Cliente(declarative_base()):
    __tablename__ = "cliente"
    id_cliente = Column(Integer, primary_key=True)
    fech_conversion = Column(Date, nullable=False)