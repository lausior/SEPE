
-- Tabla que almacena la información de los contactos
CREATE TABLE contacto (
    -- Identificador único del contacto
    id_contacto SERIAL PRIMARY KEY,
    -- Nombre del contacto
    nome VARCHAR(100) NOT NULL,
    -- Dirección del contacto
    enderezo VARCHAR(200),
    -- Teléfono del contacto
    telefono VARCHAR(20) NOT NULL,
    -- Correo electrónico del contacto
    email VARCHAR(50) NOT NULL,
    -- Observaciones o notas sobre el contacto
    notas TEXT
);

-- Tabla que almacena la información de los agentes
CREATE TABLE axente (
    -- Identificador único del agente
    id_axente SERIAL PRIMARY KEY,
    -- Nombre del agente
    nome VARCHAR(100) NOT NULL,
    -- Teléfono del agente
    telefono VARCHAR(20) NOT NULL,
    -- Correo electrónico del agente (único)
    email VARCHAR(50) UNIQUE NOT NULL
);

-- Tabla intermedia que relaciona contactos y agentes
CREATE TABLE asignacion (
    -- Identificador del contacto
    id_contacto INTEGER,
    -- Identificador del agente
    id_axente INTEGER,
    -- Clave primaria compuesta
    CONSTRAINT pk_asignacion PRIMARY KEY (id_contacto, id_axente),
    -- Clave foránea hacia la tabla contacto
    CONSTRAINT fk1_asignacion
        FOREIGN KEY (id_contacto)
        REFERENCES contacto(id_contacto),
    -- Clave foránea hacia la tabla axente
    CONSTRAINT fk2_asignacion
        FOREIGN KEY (id_axente)
        REFERENCES axente(id_axente)
);

-- Tabla que registra el historial de un contacto
CREATE TABLE historial (
    -- Identificador único del historial
    id_historial SERIAL PRIMARY KEY,
    -- Contacto al que pertenece el historial
    id_contacto INTEGER NOT NULL,
    -- Fecha y hora del registro
    marca_temporal TIMESTAMP NOT NULL DEFAULT NOW(),
    -- Probabilidad de conversión
    probabilidade_conversion SMALLINT,
    -- Observaciones sobre el seguimiento
    observacions TEXT,
    -- Clave foránea hacia contacto
    CONSTRAINT fk_historial
        FOREIGN KEY (id_contacto)
        REFERENCES contacto(id_contacto)
);

-- Tabla con la información de prospección de un contacto
CREATE TABLE prospeccion (
    -- Identificador de la prospección
    id_prospeccion INTEGER PRIMARY KEY,
    -- Fecha de captación
    captacion DATE,
    -- Fecha de cierre
    peche DATE,
    -- Fecha de aceptación
    aceptado DATE,
    -- Motivo relacionado con la prospección
    motivo TEXT,
    -- Clave foránea hacia contacto
    CONSTRAINT fk_prospeccion
        FOREIGN KEY (id_prospeccion)
        REFERENCES contacto(id_contacto)
);

-- Tabla que almacena los contactos convertidos en clientes
CREATE TABLE cliente (
    -- Identificador del cliente
    id_cliente INTEGER PRIMARY KEY,
    -- Fecha de conversión a cliente
    fech_conversion DATE,
    -- Clave foránea hacia contacto
    CONSTRAINT fk_cliente
        FOREIGN KEY (id_cliente)
        REFERENCES contacto(id_contacto)
);