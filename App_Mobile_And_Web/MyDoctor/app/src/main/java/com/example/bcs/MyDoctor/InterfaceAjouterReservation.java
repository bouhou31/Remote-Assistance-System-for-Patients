package com.example.bcs.MyDoctor;

import android.app.Activity;
import android.content.Context;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.CheckBox;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

/**
 * Created by bcs on 10/05/2016.
 */
public class InterfaceAjouterReservation extends AppCompatActivity {


    private DBAdapter BDD;
    Context context;
    Activity activite;

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        BDD = BaseDeDonnes.BDD;
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundaryajouterreservasion);
        context = this;
        activite = this;
    }

    public void ValiderAjout(View v)
    {
        String typeVehicule = "";
        String  assistanttext = "";
        String positiontext ="";
        RadioButton ambulanceUrgence = new RadioButton(this);
        RadioButton ambulanceNormale = new RadioButton(this);
        RadioButton vehiculeLeger = new RadioButton(this);

        ambulanceUrgence = (RadioButton) findViewById(R.id.AmbulanceUrgence);
        ambulanceNormale = (RadioButton) findViewById(R.id.AmbulanceNormale);
        vehiculeLeger = (RadioButton) findViewById(R.id.vehiculeLeger);

        TextView date = new TextView(this);
        date = (TextView) findViewById(R.id.date);

        CheckBox assistant = (CheckBox) findViewById(R.id.Assistant);
        CheckBox position = (CheckBox) findViewById(R.id.Position);

        RadioGroup group1 = (RadioGroup)findViewById(R.id.group1);
        if (group1.getCheckedRadioButtonId() == R.id.AmbulanceUrgence){
            typeVehicule = ambulanceUrgence.getText().toString();
        }else
        if (group1.getCheckedRadioButtonId() == R.id.AmbulanceNormale){
            typeVehicule = ambulanceNormale.getText().toString();
        }else
        if (group1.getCheckedRadioButtonId() == R.id.vehiculeLeger){
            typeVehicule = vehiculeLeger.getText().toString();
        }

        if (assistant.isChecked()) {
            assistanttext = "Sans Assistant";
        }else
        {
            assistanttext = "Avec Assistant";
        }

        if (position.isChecked()) {
            positiontext = "Sans Position";
        }else
        {
            positiontext = "Avec Position";
        }
        Toast.makeText(getBaseContext(),"Reservation effectuée", Toast.LENGTH_SHORT).show();
        BDD.insererUneReservation( typeVehicule , assistanttext,positiontext,date.getText().toString(),1);

    }
}
