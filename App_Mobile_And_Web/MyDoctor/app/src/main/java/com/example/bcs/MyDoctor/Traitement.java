package com.example.bcs.MyDoctor;

/**
 * Created by user on 14/05/2016.
 */
public class Traitement {
    private int id_traitement;
    private String description;
    private  String heure;
    private  String dose;
    private int id_patient;

    public Traitement(int id_rdv, String description, String dose,String heure, int id_patient)
    {
        this.id_traitement = id_rdv;
        this.description = description;
        this.heure = heure;
        this.dose = dose;
        this.id_patient = id_patient;
    }
    public int getId_traitement(){return this.id_traitement;}
    public String getDescription(){return this.description;};
    public  String getHeure(){return  this.heure;};
    public  String getDose(){return  this.dose;};
    public int getId_patient() {return id_patient;}
}
