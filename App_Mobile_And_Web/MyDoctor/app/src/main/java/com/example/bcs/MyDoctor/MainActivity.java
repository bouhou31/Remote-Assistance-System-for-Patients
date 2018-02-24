package com.example.bcs.MyDoctor;

import android.annotation.TargetApi;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.support.v7.app.NotificationCompat;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {


    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        BaseDeDonnes.BDD = new DBAdapter(this);
        BaseDeDonnes.BDD.open();
        BaseDeDonnes.BDD.supprimer();
        BaseDeDonnes.BDD.open2();

        BaseDeDonnes.BDD.insererUnRDV("05/06/2017", "10:30","Hopital Mustafa Bacha","Avec",1);
        BaseDeDonnes.BDD.insererUnRDV("10/07/2017", "13:00","Hopital Ain Naadja","Sans",1);
        BaseDeDonnes.BDD.insererUnRDV("20/08/2017", "11:00","Hopital Mustafa Bacha","Sans",1);

        BaseDeDonnes.BDD.insererUnTraitement("Glucobay", "1 comprimé à midi & 1 comprimé le soir, aprés les repas","12:00,20:00",1);
        BaseDeDonnes.BDD.insererUnTraitement("Doliprane", "Maximum 3 comprimés par jour","Un intervalle de 6 heures entre 2 prises",1);

        BaseDeDonnes.BDD.insererUneReservation("Ambulance de soins urgents", "Avec","Sans","12/06/2017",1);

        BaseDeDonnes.BDD.insererUnPatient("Aissaoui", "Ilhem","23/04/1995","Ahmed Franssis","ei_aissaoui@esi.dz"
                ,"0796223868","Célibataire","Feminin","Type1","06/06/2014","hypertendu","06/10/2015"
                ,"160 cm","B+","50 kg","0796223868");


        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        // getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_prelevement) {
            Prelevement();
        } else if (id == R.id.nav_notification) {
            Notification();
        } else if (id == R.id.nav_bluetooth) {
            communiquer();
        } else if (id == R.id.nav_urgence) {
            Urgence();

        } else if (id == R.id.nav_traitement) {
            Traitement();

        } else if (id == R.id.nav_rdv) {
            RendezVous();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    @TargetApi(Build.VERSION_CODES.JELLY_BEAN)
    public void Notification()
    {
        NotificationCompat.Builder mBuilder =
                (NotificationCompat.Builder) new NotificationCompat.Builder(this)
                        .setSmallIcon(R.drawable.notification_icon)
                        .setContentTitle("Bonjour MyDoctor ")
                        .setContentText("c'est l'heure de ton prélévement de glycémie !");
        Intent resultIntent = new Intent(this, InterfaceNotification.class);
        TaskStackBuilder stackBuilder = TaskStackBuilder.create(this);
        stackBuilder.addParentStack(InterfaceNotification.class);
        stackBuilder.addNextIntent(resultIntent);
        PendingIntent resultPendingIntent =
                stackBuilder.getPendingIntent(
                        0,
                        PendingIntent.FLAG_UPDATE_CURRENT
                );
        mBuilder.setContentIntent(resultPendingIntent);
        NotificationManager mNotificationManager =
                (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);
        int mId=0;
        mNotificationManager.notify(mId, mBuilder.build());

    }


    public void Urgence()
    {
        Intent intent = new Intent(this, InterfaceUrgence.class);
        this.startActivityForResult(intent, 1000);
    }

    public void Prelevement()
    {
        Intent intent = new Intent(this, InterfacePrelevement.class);
        this.startActivityForResult(intent, 1000);
    }
    public void Traitement()
    {
        Intent intent = new Intent(this, InterfaceTraitement.class);
        this.startActivityForResult(intent, 1000);
    }
    public void RendezVous()
    {
        Intent intent = new Intent(this, InterfaceRendezVous.class);
        this.startActivityForResult(intent, 1000);
    }

    public void communiquer()
    {
        Toast.makeText(getBaseContext(),"Résultats récupérés de l'appareil, et envoyés avec succés", Toast.LENGTH_SHORT).show();
    }
}
