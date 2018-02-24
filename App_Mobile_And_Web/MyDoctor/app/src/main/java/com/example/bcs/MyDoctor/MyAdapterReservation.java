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
public class MyAdapterReservation extends BaseAdapter {

    private ArrayList<Reservation> reservation;
    private LayoutInflater myInflater;
    public MyAdapterReservation(Context context, ArrayList<Reservation> reservation){
        
        this.myInflater = LayoutInflater.from(context);
        this.reservation = reservation;
    }
    @Override
    public int getCount() {
        return reservation.size();
    }

    @Override
    public Object getItem(int position) {
        return null;
    }


    @Override
    public long getItemId(int position) {
        return position;}


    public static class ViewHolder {
        TextView typevehicule;
        TextView date;
        TextView assist;
        TextView posit;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder ;
        if (convertView == null) {
            convertView = myInflater.inflate(R.layout.boundaryreservationlist, null);
            holder = new ViewHolder();
            holder.typevehicule = (TextView) convertView.findViewById(R.id.typevehicule);
            holder.date = (TextView) convertView.findViewById(R.id.date);
            holder.assist= (TextView) convertView.findViewById(R.id.assistant);
            holder.posit= (TextView) convertView.findViewById(R.id.position);
            convertView.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) convertView.getTag();

        }
        holder.typevehicule.setText("Type véhicule : "+reservation.get(position).getTypevehicule());
        holder.date.setText("Date : "+reservation.get(position).getDate());
        holder.assist.setText("Avec/Sans assistant : "+reservation.get(position).getAssistant());
        holder.posit.setText("Avec/sans position : "+reservation.get(position).getPosition());
        return convertView;
    }
}
