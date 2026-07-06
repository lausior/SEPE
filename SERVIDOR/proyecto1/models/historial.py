from sqlalchemy import *
from sqlalchemy.orm import declarative_base

class Historial(declarative_base()):
    __tablename__ = "historial"
    id_historial = Column(Integer, primary_key=True)
    id_contacto = Column(Integer, nullable=False)
    marca_temporal = Column(TIMESTAMP, nullable=False)
    probabilidade_conversion = Column(SmallInteger, nullable=False)
    observacions = Column(String(100))