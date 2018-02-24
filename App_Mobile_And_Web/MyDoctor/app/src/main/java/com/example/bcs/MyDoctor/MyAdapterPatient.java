package com.example.bcs.MyDoctor;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;


/**
 * Created by user on 14/05/2016.
 */
public class MyAdapterPatient extends BaseAdapter {
    private ArrayList<Patient> patient;
    private LayoutInflater myInflater;
    public MyAdapterPatient(Context context, ArrayList<Patient>patient){
        
        this.myInflater = LayoutInflater.from(context);
        this.patient = patient;
    }
    @Override
    public int getCount() {
        return patient.size();
    }

    @Override
    public Object getItem(int position) {
        return this.patient.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;}


    public static class ViewHolder {
        TextView nompat;
        TextView prenompat;
        TextView adressepat;
        TextView emailpat;
        TextView telpatient;
        TextView datenaisspat;
        TextView etatcivipat;
        TextView sexepat;
        TextView typediabetepat;
        TextView datedebutdiabpat;
        TextView nommaladiepat;
        TextView datedebutmaladiepat;
        TextView taillepat;
        TextView typesangpat;
        TextView poidspat;
        TextView numurgencepat;

    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder ;
        if (convertView == null) {
            convertView = myInflater.inflate(R.layout.boundarypatient, null);
            holder = new ViewHolder();
            holder.nompat = (TextView) convertView.findViewById(R.id.nom);
            holder.prenompat= (TextView) convertView.findViewById(R.id.prenom);
            holder.adressepat = (TextView) convertView.findViewById(R.id.adresse);
            holder.emailpat = (TextView) convertView.findViewById(R.id.email);
            holder.telpatient = (TextView) convertView.findViewById(R.id.telephone);
            holder.datenaisspat = (TextView) convertView.findViewById(R.id.date_naissance);
            holder.etatcivipat = (TextView) convertView.findViewById(R.id.etat_civil);
            holder.sexepat = (TextView) convertView.findViewById(R.id.sexe);
            holder.typediabetepat = (TextView) convertView.findViewById(R.id.type_diabete);
            holder.datedebutdiabpat = (TextView) convertView.findViewById(R.id.date_debut_diabete);
            holder.nommaladiepat = (TextView) convertView.findViewById(R.id.nom_maladie);
            holder.datedebutmaladiepat = (TextView) convertView.findViewById(R.id.date_debut_maladie);
            holder.taillepat = (TextView) convertView.findViewById(R.id.taille);
            holder.typesangpat = (TextView) convertView.findViewById(R.id.type_sang);
            holder.poidspat = (TextView) convertView.findViewById(R.id.poids);
            holder.numurgencepat = (TextView) convertView.findViewById(R.id.num_urgence);

            convertView.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) convertView.getTag();

        }
        holder.nompat.setText("       "+patient.get(position).getNom()+"   "+patient.get(position).getPrenom());
        holder.prenompat.setText("");
        holder.adressepat.setText("    Adresse  : " +patient.get(position).getAdresse());
        holder.emailpat.setText("    Adresse mail :"+patient.get(position).getEmail());
        holder.telpatient.setText("    Téléphone :"+patient.get(position).getTelephone());
        holder.datenaisspat.setText("    Date de naissance : "+patient.get(position).getDate_naissance());
        holder.etatcivipat.setText("    Etat civil :"+patient.get(position).getEtat_civil());
        holder.sexepat.setText("    Sexe :"+patient.get(position).getSexe());
        holder.typediabetepat.setText("    Type de diabète :"+patient.get(position).getType_diabete());
        holder.datedebutdiabpat.setText("    Date début du diabète :"+patient.get(position).getDate_debut_diabete());
        holder.nommaladiepat.setText("    Nom de la maladie :"+patient.get(position).getNom_maladie());
        holder.datedebutmaladiepat.setText("    Date début de la maladie :"+patient.get(position).getDate_debut_maladie());
        holder.taillepat.setText("    Taille :"+patient.get(position).getTaille());
        holder.typesangpat.setText("    Groupe sanguin :"+patient.get(position).getTypesang());
        holder.poidspat.setText("    Poids :"+patient.get(position).getPoids());
        holder.numurgencepat.setText("    Numèro d'urgence :"+patient.get(position).getNumurgence());

        return convertView;
    }
}
