from sqlalchemy import *
from sqlalchemy.orm import declarative_base

class Prospeccion(declarative_base()):
    __tablename__ = "prospeccion"
    id_prospeccion = Column(Integer, primary_key=True)
    captacion = Column(Date, nullable=False)
    peche = Column(Date, nullable=False)
    aceptado = Column(Date, nullable=False)
    motivo = Column(String(200), nullable=False)
