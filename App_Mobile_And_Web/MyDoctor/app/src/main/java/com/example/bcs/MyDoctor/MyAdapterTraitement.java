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
public class MyAdapterTraitement extends BaseAdapter {
    private ArrayList<Traitement> traitement;
    private LayoutInflater myInflater;
    public MyAdapterTraitement(Context context, ArrayList<Traitement>traitement){
        
        this.myInflater = LayoutInflater.from(context);
        this.traitement = traitement;
    }
    @Override
    public int getCount() {
        return traitement.size();
    }

    @Override
    public Object getItem(int position) {
        return this.traitement.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;}


    public static class ViewHolder {
        TextView descriptiontrait;
        TextView heuretrait;
        TextView dosetrait;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder ;
        if (convertView == null) {
            convertView = myInflater.inflate(R.layout.boundarytraitementlist, null);
            holder = new ViewHolder();
            holder.descriptiontrait = (TextView) convertView.findViewById(R.id.descriptiontraitement);
            holder.heuretrait = (TextView) convertView.findViewById(R.id.heure);
            holder.dosetrait = (TextView) convertView.findViewById(R.id.dosetraitement);
            convertView.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) convertView.getTag();

        }
        holder.descriptiontrait.setText("Traitement : "+traitement.get(position).getDescription());
        holder.heuretrait.setText("Heure de la prise : "+traitement.get(position).getHeure());
        holder.dosetrait.setText("Dose : "+traitement.get(position).getDose());
        return convertView;
    }
}
