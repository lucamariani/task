DEV CHALLENGE
===============================

### Installazione

``` # composer install```

### Utilizzo

L'applicazione e' dotata di una semplice interfaccia a riga di comando accessibile 
tramite l'eseguibile ```# ./bin/report```

Se viene eseguito con l'opzione -h mostra l'help del comando:
```
# ./bin/report -h
  
  Command report, version 1.0.0
  
  Show customer transactions' report
  
  Usage: report [OPTIONS...] [ARGUMENTS...]
  
  Arguments:
    <customerID>    
  
  Options:
    [-c|--currency-converter]    Choose the currency converter to use: [Normal, Cached]. Default: Cached
    [-d|--data-source]           Choose the data source to use: [csv, db]. Default: csv
    [-h|--help]                  Show help
    [-v|--verbosity]             Verbosity level
    [-V|--version]               Show version
    [-w|--web-service]           Choose the web service to use: [Yahoo, Sole24Ore]. Default: Sole24Ore
  
  Legend: <required> [optional] variadic...
```

Le opzioni di scelta (-c, -d, -w) non sono state realmente implementate.
Sono state inserite per evidenziare a livello di codice come gestirle tramite Dependency Injection.

Per vedere il report delle transazioni di un cliente si deve eseguire passando
l'id del cliente come argomento:

```# ./bin/report 2```

### Test automatici

Per eseguire i test lanciare il seguente comando:

```# ./bin/dotest``` 

### Librerie utilizzate

- PHPUnit (composer require --dev phpunit/phpunit ^7) - questa versione 
  necessita di php-7.1+
- adhocore/cli (https://github.com/adhocore/php-cli) - 
  Framework agnostic Command Line Interface utilities and helpers for PHP
  
### Modifiche al task originario

Il file data.csv e' stato modificato sostituendo i simboli delle valute, secondo questo schema:

- € -> E
- £ -> S
- $ -> D

La modifica e' stata fatta per ovviare ad un problema di encoding nel sistema di sviluppo utilizzato, 
che non mi permetteva di utilizzare i simboli originali.
 
Dato il tempo a disposizione e lo scopo dell'applicativo ho preferito modificare il file dei dati.