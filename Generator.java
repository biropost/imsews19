import org.postgresql.util.PSQLException;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.ThreadLocalRandom;


public class Generator {

    public static void main(String[] var0) {
        try {
            Connection con = null;
            Class.forName("org.postgresql.Driver");
            con =
                    DriverManager.getConnection("jdbc:postgresql://localhost:5432/postgres", "postgres", "imsews19");

            Statement statement = con.createStatement();

            int datasets;
            try {

                String[] arrvname = new String[]{"Mehmet", "Muhammed", "Rosin", "Frank", "Tobias", "Lothar", "Patrick", "Markus", "Christian", "Günther", "Serhat", "Mustafa", "Rahmi", "Jürgen", "Sven", "Baris", "Tamara", "Viktoria", "Julia", "Sandra", "Elisabetz", "Lukas", "Burak", "Emre", "Marko", "Grace", "Kendrick", "Snoop", "Wouter", "Kluas", "Lorenz", "Raphael", "Wolfgang", "Ayse", "Eda", "Linda", "Berfin", "Chris", "Hannes", "Fabian", "Kobe", "Derrick", "Kawhi", "Demar"};
                String[] arrnname = new String[]{"Brückler", "Göksen", "Iscen", "Akinci", "Herzer", "Mayer", "Doppelmayr", "Blum", "Hofer", "Spar", "Rohner", "Berchthold", "Hämmerle", "Kresser", "Bernal", "Mahmood", "Ross", "Benedikt", "Baljak", "Prvulovic", "Andic", "Krstic", "Pilicic", "Gans", "Brugger", "Lamar", "Dogg", "Rijkaard", "Buffon", "Mulsera", "Hurn", "Mars", "Ayodeji", "Schmölzer", "Fend", "Zumtobel", "Reiter", "Sentürk", "Aktas", "Yilmaz", "Bryant", "Rose", "Leonard", "Derozan"};
                String[] arrpos = new String[]{"PG", "SG", "SF", "PF", "C"};

                String stmt = "";
                Integer vname;
                Integer nname;
                Integer pos;
                for(int i = 1; i < 7; i++) {
                    int val = ThreadLocalRandom.current().nextInt(0, 1000);
                    stmt = "INSERT INTO team (bezeichnung, homecourt, headcoach, gruendungsjahr) " +
                            "VALUES ('team-"+val+"', 'court-"+val+"', 'coach-"+val+"', "+ThreadLocalRandom.current().nextInt(1970, 2000)+") " +
                            "ON CONFLICT (bezeichnung) \n" +
                            "DO NOTHING;";
                    statement.executeUpdate(stmt);
                    stmt = "SELECT ID FROM team WHERE bezeichnung = 'team-"+val+"'";
                    ResultSet rsID = statement.executeQuery(stmt);
                    int tid = 0;
                    if(rsID.next()) {
                        tid = rsID.getInt(1);
                    } else {
                        continue;
                    }
                    for(int j = 0; j < 50; j++) {
                        vname = ThreadLocalRandom.current().nextInt(0, arrvname.length);
                        nname = ThreadLocalRandom.current().nextInt(0, arrnname.length);
                        pos = ThreadLocalRandom.current().nextInt(0, arrpos.length);
                        stmt = "INSERT INTO Spieler (Name, Groesse, Gewicht, Trikotnr, Position, TID) ";
                        stmt += "VALUES('" + vname + " " + nname + "', " +
                                ThreadLocalRandom.current().nextInt(180, 220) + ", " +
                                ThreadLocalRandom.current().nextInt(70, 130) + ", " +
                                ThreadLocalRandom.current().nextInt(0, 99) + ", '" + arrpos[pos] + "', " + tid + ");";
                        statement.executeUpdate(stmt);
                    }
                }

                ArrayList arrSpieler = new ArrayList();
                ResultSet var9 = statement.executeQuery("SELECT ID FROM Spieler");
                while(var9.next()) {
                    arrSpieler.add(var9.getRow());
                }
                var9.close();

                for(int i = 10; i < 1500; i++) {
                    stmt = "INSERT INTO IndPerformance (PTS, REB, AST, Blocks, TOs, FGA, FGM, SID)";
                    stmt += "VALUES(" + ThreadLocalRandom.current().nextInt(0, 80) + ", " +
                            ThreadLocalRandom.current().nextInt(0, 30) + ", " +
                            ThreadLocalRandom.current().nextInt(0, 30) + ", " +
                            ThreadLocalRandom.current().nextInt(0, 20) + ", " +
                            ThreadLocalRandom.current().nextInt(0, 20) + ", " +
                            ThreadLocalRandom.current().nextInt(0, 40) + ", " +
                            ThreadLocalRandom.current().nextInt(0, 40) + ", " +
                            ThreadLocalRandom.current().nextInt(1, arrSpieler.size()+1) + ");";
                    try {
                        statement.executeUpdate(stmt);
                    } catch (PSQLException e) {
                        continue;
                    }
                }
                stmt = "SELECT * FROM team";
                ResultSet rsP = statement.executeQuery(stmt);
                List<String> list = new ArrayList<>();
                while (rsP.next()) {
                    String id = rsP.getString(1);
                    list.add(id);

                }
                for (String id : list) {
                    stmt = "INSERT INTO Performance (PTS, REB, AST, Blocks, TOs, FGA, FGM, TID)";
                    stmt += "VALUES(" + ThreadLocalRandom.current().nextInt(50, 150) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 80) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 80) + ", " +
                            ThreadLocalRandom.current().nextInt(20, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(20, 100) + ", " +
                            id + ");";
                    statement.executeUpdate(stmt);
                }
                /*
                for(int i = 10; i < 1500; i++) {
                    stmt = "INSERT INTO Performance (PTS, REB, AST, Blocks, TOs, FGA, FGM, TID)";
                    stmt += "VALUES(" + ThreadLocalRandom.current().nextInt(50, 150) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 80) + ", " +
                            ThreadLocalRandom.current().nextInt(10, 80) + ", " +
                            ThreadLocalRandom.current().nextInt(20, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(20, 100) + ", " +
                            ThreadLocalRandom.current().nextInt(1, 7) + ");";
                    try {
                        statement.executeUpdate(stmt);
                    } catch (PSQLException e) {
                        System.out.println(e.getMessage() + i);
                        continue;
                    }
                }
                 */

            } catch (Exception e) {
                e.printStackTrace();
                System.err.println("Fehler beim Einfuegen des Datensatzes: " + e.getMessage());
            }

            ResultSet rs = statement.executeQuery("SELECT COUNT(*) FROM Spieler");
            if (rs.next()) {
                datasets = rs.getInt(1);
                System.out.println("Number of Spieler: " + datasets);
            }

            rs = statement.executeQuery("SELECT COUNT(*) FROM Performance");
            if (rs.next()) {
                datasets = rs.getInt(1);
                System.out.println("Number of datasets in Performance: " + datasets);
            }

            rs = statement.executeQuery("SELECT COUNT(*) FROM IndPerformance");
            if (rs.next()) {
                datasets = rs.getInt(1);
                System.out.println("Number of datasets in IndPerformance: " + datasets);
            }
            rs.close();
            statement.close();
            con.close();
        } catch (Exception e) {
            e.printStackTrace();
        }

    }
}
