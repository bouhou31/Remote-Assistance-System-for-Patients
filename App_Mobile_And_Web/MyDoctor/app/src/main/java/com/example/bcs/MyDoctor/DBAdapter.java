package com.example.bcs.MyDoctor;
import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;


public class DBAdapter {

    DatabaseHelper	DBHelper;
    Context			context;
    SQLiteDatabase	db;
/// la classe DBAdapeter va creer la bdd et contenir les fonctions de mise à jour
    public DBAdapter(Context context){
        this.context = context;
        DBHelper = new DatabaseHelper(context);

    }

    public class DatabaseHelper extends SQLiteOpenHelper{

        Context			context;

        public DatabaseHelper(Context context) {
            super(context, "MyDoctor", null, 1);
            this.context = context;
        }
        @Override
        public void onCreate(SQLiteDatabase db) {


            db.execSQL("create table Patient (id_patient integer primary key autoincrement, " +
                    "nom text not null, prenom text not null, date_naissance text not null, adresse  text not null, email text not null, " +
                    "telephone text not null, etat_civil text not null, sexe text not null, type_diabete text, date_debut_diabete text ," +
                    "nom_maladie text, date_debut_maladie text, taille text not null, type_sang text not null, poids text not null, num_urgence text);");

            db.execSQL("create table RDV (id_rdv integer primary key autoincrement," +
                    " date_rdv text not null, heure text not null, unite text not null, reservation text not null, id_patient integer not null);");

            db.execSQL("create table Reservation (id_reservation integer primary key autoincrement, type_vehicule text not null" +
                    ", assistant text not null , position text not null, date String not null,id_patient Integer not null);");

            db.execSQL("create table Traitement (id_traitement integer primary key autoincrement,  " +
                    "description text not null, dose text not null, heure String not null , id_patient integer not null);");

        }

            @Override
        public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
            Toast.makeText(context, "Mise à jour de la Base de données version "+oldVersion+" vers "+newVersion, Toast.LENGTH_SHORT).show();
            db.execSQL("DROP TABLE IF EXISTS Utilisateur");
            onCreate(db);
        }

    }

    public DBAdapter open(){
        db = DBHelper.getWritableDatabase();
       // DBHelper.onCreate(db);
        return this;
    }
    public DBAdapter open2(){
        db = DBHelper.getWritableDatabase();
         DBHelper.onCreate(db);
        return this;
    }

    public void close(){
        db.close();
    }

  /*  public void Truncate(){
        db.execSQL("DELETE FROM Utilisateur");
    }*/

    public long insererUnRDV (String date_rdv, String heure, String unite, String reservation, Integer id_patient) {
        ContentValues values = new ContentValues();
        values.put("date_rdv",date_rdv);
        values.put("heure",heure);
        values.put("reservation",reservation);
        values.put("unite",unite);
        values.put("id_patient",id_patient);
        return db.insert("RDV", null, values);
    }

    public long insererUnPatient (String nom, String prenom, String date_naissance, String adresse, String email, String telephone, String etat_civil, String sexe, String type_diabete, String date_debut_diabete, String nom_maladie, String date_debut_maladie, String taille, String typesang, String poids, String numurgence) {
        ContentValues values = new ContentValues();
        values.put("nom",nom);
        values.put("prenom",prenom);
        values.put("date_naissance",date_naissance);
        values.put("adresse",adresse);
        values.put("email",email);
        values.put("telephone",telephone);
        values.put("etat_civil",etat_civil);
        values.put("sexe",sexe);
        values.put("type_diabete",type_diabete);
        values.put("date_debut_diabete",date_debut_diabete);
        values.put("nom_maladie",nom_maladie);
        values.put("date_debut_maladie",date_debut_maladie);
        values.put("taille",taille);
        values.put("type_sang",typesang);
        values.put("poids",poids);
        values.put("num_urgence",numurgence);
        return db.insert("Patient", null, values);
    }
    public long insererUneReservation(String type_vehicule,String assistant , String position, String date, int id_patient) {
        ContentValues values = new ContentValues();
        values.put("type_vehicule", type_vehicule);
        values.put("assistant", assistant);
        values.put("position", position);
        values.put("date", date);
        values.put("id_patient", id_patient);
        return db.insert("Reservation", null, values);
    }

    public long insererUnTraitement(String description,String dose , String heure, Integer id_patient) {
        ContentValues values = new ContentValues();
        values.put("description", description);
        values.put("dose", dose);
        values.put("heure", heure);
        values.put("id_patient", id_patient);
        return db.insert("Traitement", null, values);
    }


    public boolean supprimer (){
        db.execSQL("Drop table Patient;");
        db.execSQL("Drop table RDV;");
        db.execSQL("Drop table Traitement;");
        db.execSQL("Drop table Reservation;");
        return true;
    }

    public void updatePatient (Integer id_patient,String newadresse, String newemail, String newtel,String num_urgence){
        db.execSQL("UPDATE Patient set adresse = \""+newadresse+"\" " +
                "where id_patient =\""+id_patient+"\";");
        db.execSQL("UPDATE Patient set email = \""+newemail+"\" " +
                "where id_patient =\""+id_patient+"\";");
        db.execSQL("UPDATE Patient set telephone= \""+newtel+"\" " +
                "where id_patient =\""+id_patient+"\";");
        db.execSQL("UPDATE Patient set num_urgence= \""+num_urgence+"\" " +
                "where id_patient =\""+id_patient+"\";");
    }

    public Cursor recupererLaListeDesTraitementParPatient (int patient){
        return  db.query("Traitement", new String[]{"Id_traitement","description","dose","heure"}, "id_patient="+String.valueOf(patient), null, null, null, null);
    }

    public Cursor recupererLaListeDesRDVParPatient (int patient){
        return  db.query("RDV", new String[]{"Id_rdv", "date_rdv","heure", "unite", "reservation"}, "id_patient="+String.valueOf(patient), null, null, null, null);
    }

    public Cursor recupererLaListeDesReservationsParPatient (int patient){
        return  db.query("Reservation", new String[]{ "id_reservation", "type_vehicule", "assistant", "position","date"}, "id_patient="+String.valueOf(patient), null, null, null, null);
    }

    public Cursor recupererUnPatient (int patient){
        return  db.query("Patient", new String[]{ "id_patient", "nom", "prenom","date_naissance", "adresse","email","telephone","etat_civil","sexe", "type_diabete","date_debut_diabete","nom_maladie","date_debut_maladie","taille","type_sang","poids","num_urgence"}, "id_patient="+String.valueOf(patient), null, null, null, null);
    }

}
