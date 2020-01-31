package jframe.classes;

import java.util.logging.Logger;
import java.io.IOException;
import java.util.logging.FileHandler;
import java.util.logging.SimpleFormatter;

public class Log {

    /* Definim la variable logger, la qual cridarem posteriorment al llarg de la classe */
    public final Logger logger = Logger.getLogger(Log.class.getName());

    /* Definim la variable fh, la qual utilitzarem per a la creació del fitxer */
    FileHandler fh;

    /* Definim el metode que generara fitxers logs d'informació, on hi passem l'ubicació del fitxer i el missatge a introduir */
    public void generarInfoLog(String ruta, String missatge) {

        /* Establim un try catch per a tractar possibles errors */
        try {
            //Assignem la ruta del fitxer a la variable fh
            fh = new FileHandler(ruta, true);
            logger.addHandler(fh);

            //Realitzem la creació i assignació de la variable formatter per a poder formatar el fitxer
            SimpleFormatter formatter = new SimpleFormatter();
            fh.setFormatter(formatter);

            //Afegim el missatge a mostrar en el log
            logger.info(missatge);

            //Tanquem la gestió del fitxer
            fh.close();

        } catch (SecurityException e) {

            logger.warning(e.toString());

        } catch (IOException e) {

            logger.warning(e.toString());

        }

    }

    /* Definim el metode que generara fitxers logs d'errors, on hi passem l'ubicació del fitxer i el missatge a introduir */
    public void generarErrorLog(String ruta, String missatge) {

        try {

            fh = new FileHandler(ruta, true);
            logger.addHandler(fh);

            SimpleFormatter formatter = new SimpleFormatter();
            fh.setFormatter(formatter);

            logger.warning(missatge);

            fh.close();

        } catch (SecurityException e) {

            logger.warning(e.toString());

        } catch (IOException e) {

            logger.warning(e.toString());

        }

    }

}
