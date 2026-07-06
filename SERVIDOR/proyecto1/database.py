# Crea la clase base de la que heredarán todos los modelos de la aplicación.
# Gracias a esta clase, SQLAlchemy reconoce qué clases representan tablas
# de la base de datos y puede mapearlas con PostgreSQL.

from sqlalchemy.orm import declarative_base #Importa la función declarative_base() desde el módulo sqlalchemy.orm

Base = declarative_base()
#Aquí llamas a la función declarative_base().
#Esta función devuelve una nueva clase, que guardas en la variable Base.
#A partir de ese momento, todos los modelos deberán heredar de ella.