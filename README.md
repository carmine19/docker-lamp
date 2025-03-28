# LAMP Stack con Docker Multi-PHP

Questo progetto fornisce un ambiente LAMP (Linux, Apache, MySQL, PHP) utilizzando Docker con supporto per multiple versioni di PHP (7.4, 8.1, 8.2) e PHPMyAdmin.

## Struttura del Progetto

```
.
├── config/                  # Configurazioni
│   ├── apache/              # Configurazioni Apache
│   ├── mysql/               # Configurazioni MySQL
│   └── php/                 # Configurazioni PHP per diverse versioni
├── php/                     # Dockerfile per diverse versioni di PHP
│   ├── 7.4/
│   ├── 8.1/
│   └── 8.2/
├── www/                     # Directory per i file del sito web
└── docker-compose.yml       # Configurazione Docker Compose
```

## Requisiti

- Docker
- Docker Compose

## Installazione e Utilizzo

1. Clona questo repository:

```bash
git clone <repository-url>
cd lamp-docker
```

2. Avvia i container:

```bash
docker-compose up -d
```

3. Accedi ai servizi:

- PHP 7.4: http://localhost:8074
- PHP 8.1: http://localhost:8081
- PHP 8.2: http://localhost:8082
- PHPMyAdmin: http://localhost:8000

## Configurazione del Database

- **Host**: mysql
- **Porta**: 3306
- **Root Password**: root_password
- **Database**: lamp_db
- **Utente**: lamp_user
- **Password**: lamp_password

## Utilizzo di Diverse Versioni di PHP

Ogni versione di PHP è accessibile tramite una porta diversa:

- PHP 7.4: http://localhost:8074
- PHP 8.1: http://localhost:8081
- PHP 8.2: http://localhost:8082

Tutti i servizi condividono la stessa directory `www` per i file del sito web.

## Personalizzazione

### Configurazione PHP

Modifica i file in `config/php/[version]/php.ini` per personalizzare le impostazioni PHP.

### Configurazione Apache

Modifica i file in `config/apache/sites-available/` per personalizzare le configurazioni di Apache.

### Configurazione MySQL

Modifica il file `config/mysql/my.cnf` per personalizzare le impostazioni MySQL.

## Arresto dei Container

```bash
docker-compose down
```

Per eliminare anche i volumi (cancellando tutti i dati del database):

```bash
docker-compose down -v
```


## Laravel

Per visualizzare il sito Laravel in esecuzione su Docker con lo stack LAMP, dovresti accedere 
all'URL http://localhost:8082/public/ nel tuo browser. Questo perché Laravel richiede che il punto di ingresso 
sia la cartella public. Se stai vedendo solo la root del progetto, significa che stai accedendo alla directory 
principale invece che al punto di ingresso dell'applicazione Laravel. Alternativamente, puoi configurare il 
virtual host di Apache per puntare direttamente alla cartella public, modificando il file di configurazione 
in config/apache/sites-available. Se hai installato Jetstream, dovresti vedere la pagina di login dopo aver 
eseguito correttamente le migrazioni e aver configurato l'ambiente.

Per rendere effettive le modifiche riavvia php nel contenitore docker: 

```bash
 docker-compose restart php74 php81 php82
 ```

 se hai problemi riavvia tutti i container:

 ```bash
 docker-compose restart
 ```

## Licenza

Questo progetto è distribuito con licenza MIT. Sentiti libero di utilizzarlo e modificarlo secondo le tue esigenze.