package com.example.bcs.MyDoctor;

/**
 * Created by user on 14/05/2016.
 */
public class RDV {
    private int id_rdv;
    private String date_rdv;
    private  String heure;
    private  String unite;
    private  String reservation;
    private int id_patient;

    public RDV(int id_rdv, String date_rdv, String heure, String unite, String reservation, int id_patient)
    {
        this.id_rdv = id_rdv;
        this.date_rdv = date_rdv;
        this.heure = heure;
        this.unite = unite;
        this.reservation = reservation;
        this.id_patient = id_patient;
    }
    public int getid_rdv(){return this.id_rdv;}
    public String getDate_rdv(){return this.date_rdv;};
    public  String getHeure(){return  this.heure;};
    public String getUnite(){return this.unite;};
    public String getReservation(){return  this.reservation;};
    public int getId_patient() {return id_patient;}
}
