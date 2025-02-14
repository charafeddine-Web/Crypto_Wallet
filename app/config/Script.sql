CREATE TYPE active_status AS ENUM ('0', '1');
CREATE SEQUENCE nexus_id_seq START 1000 INCREMENT 1 NO MAXVALUE;

CREATE TABLE users (
                       NexusId INTEGER PRIMARY KEY DEFAULT nextval('nexus_id_seq'),
                       nom varchar(100) NOT NULL,
                       prenom varchar(100) NOT NULL,
                       email varchar(100) NOT NULL,
                       mot_de_pass varchar(255) NOT NULL,
                       create_at timestamp,
                       is_active active_status DEFAULT '0',
                       verification_code text,
                       CHECK (NexusId BETWEEN 1000 AND 999999)

);

CREATE TABLE Cryptomonnaie (
                               id_cryptomonnaie SERIAL PRIMARY KEY,
                               nom varchar(100) NOT NULL,
                               symbole varchar(100) NOT NULL,
                               slug varchar(100) NOT NULL,
                               max_supply float8 NOT NULL,
                               prix float4 NOT NULL,
                               classement int NOT NULL,
                               marketCap float4 NOT NULL,
                               volume24h float4 NOT NULL,
                               circulatingSupply float4 NOT NULL,
                               total_Supply float4 NOT NULL
);

CREATE TABLE portefeuille (
                              id SERIAL PRIMARY KEY,
                              user_id INT REFERENCES users(NexusId),
                              crypto_id  INT REFERENCES Cryptomonnaie(id_cryptomonnaie),
                              soldUSDT float DEFAULT 0

);


CREATE TABLE Watchlist (
                           user_id int references users(NexusId),
                           id_cryptomonnaie int references Cryptomonnaie(id_cryptomonnaie),
                           creation_date timestamp
);

CREATE TABLE transaction (
                             idTransaction SERIAL PRIMARY KEY,
                             montant float NOT NULL,
                             sender_id int REFERENCES users(NexusId),
                             receiver_id int REFERENCES users(NexusId),
                             date timestamp,
                             crypto_id INT REFERENCES Cryptomonnaie(id_cryptomonnaie),
                             receiver text
);


CREATE TABLE CryptoWallet (
                              user_id INT REFERENCES users(NexusId),
                              id_cryptomonnaie INT REFERENCES Cryptomonnaie(id_cryptomonnaie),
                              amount DECIMAL(18, 8) NOT NULL,
                              PRIMARY KEY (user_id, id_cryptomonnaie)
);


CREATE TYPE notif_types AS ENUM ('send', 'receiver');
CREATE TABLE Notification (
                              idNotif SERIAL PRIMARY KEY,
                              message TEXT NOT NULL,
                              type notif_types,
                              user_id int REFERENCES users(NexusId),
                              date timestamp
);