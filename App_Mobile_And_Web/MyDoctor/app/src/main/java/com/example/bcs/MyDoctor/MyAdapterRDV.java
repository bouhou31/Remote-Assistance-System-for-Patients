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
public class MyAdapterRDV extends BaseAdapter {
    private ArrayList<RDV> rdv;
    private LayoutInflater myInflater;
    public MyAdapterRDV(Context context, ArrayList<RDV>rdv){
        
        this.myInflater = LayoutInflater.from(context);
        this.rdv = rdv;
    }
    @Override
    public int getCount() {
        return rdv.size();
    }

    @Override
    public Object getItem(int position) {
        return this.rdv.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;}


    public static class ViewHolder {
        TextView uniterdv;
        TextView daterdv;
        TextView heurerdv;
        TextView resevationrdv;
        public String getUniterdv (){
            return  uniterdv.getText().toString();
        }
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder ;//= new ViewHolder();
        if (convertView == null) {
            convertView = myInflater.inflate(R.layout.boundaryrendezvouslist, null);
            holder = new ViewHolder();
            holder.daterdv = (TextView) convertView.findViewById(R.id.date);
            holder.uniterdv = (TextView) convertView.findViewById(R.id.unite);
            holder.heurerdv = (TextView) convertView.findViewById(R.id.heure);
            holder.resevationrdv = (TextView) convertView.findViewById(R.id.Reservation);
            convertView.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) convertView.getTag();

        }
        holder.uniterdv.setText("      Unité : "+rdv.get(position).getUnite());
        holder.daterdv.setText("      Date : "+rdv.get(position).getDate_rdv());
        holder.heurerdv.setText("      Heure : "+rdv.get(position).getHeure());
        holder.resevationrdv.setText("      Avec/Sans réservation : "+rdv.get(position).getReservation());
        return convertView;
    }
}
