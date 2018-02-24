package com.example.bcs.MyDoctor;

/**
 * Created by user on 14/05/2016.
 */
public class Reservation {
    private int id_reservation;
    private String date;
    private  String assistant;
    private  String position;
    private  String typevehicule;
    private int id_patient;

    public Reservation(int id_reservation, String typevehicule, String assistant, String position,String date, int id_patient)
    {
        this.id_reservation = id_reservation;
        this.date = date;
        this.assistant = assistant;
        this.position = position;
        this.id_patient = id_patient;
        this.typevehicule = typevehicule;
    }
    public int getId_reservation(){return this.id_reservation;}
    public String getDate(){return this.date;};
    public  String getPosition(){return  this.position;};
    public String getAssistant(){return this.assistant;};
    public int getId_patient() {return id_patient;}
    public String getTypevehicule(){return this.typevehicule;}
}
