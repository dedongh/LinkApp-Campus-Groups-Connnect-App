package com.engineerskasa.linkapp;

import android.content.Intent;
import android.support.v4.view.MenuItemCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.SearchView;

import com.engineerskasa.linkapp.Adapter.DashboardAdapter;
import com.engineerskasa.linkapp.Models.GroupList;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.Remote.RetrofitClient;
import com.google.firebase.messaging.FirebaseMessaging;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {


    RecyclerView dashboardRecycler;
    DashboardAdapter mDashboardAdapter;
    FetchInfo mFetchInfo;
    Button mEvents;
    static boolean calledAlready = false;
    SearchView mSearchView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        if (!calledAlready)
        {
            FirebaseMessaging.getInstance().subscribeToTopic("events");
            calledAlready = true;
        }


        dashboardRecycler = (RecyclerView)findViewById(R.id.dashboard_recycler);
        dashboardRecycler.setLayoutManager(new GridLayoutManager(MainActivity.this,2));
        dashboardRecycler.setItemAnimator(new DefaultItemAnimator());
        
        
        mFetchInfo = RetrofitClient.getAPIService();

        mEvents = (Button)findViewById(R.id.btnEvents);
        mSearchView = (SearchView)findViewById(R.id.dashboard_searchview);
        mSearchView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                mSearchView.setIconified(false);
            }
        });
        mSearchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String s) {
                return false;
            }

            @Override
            public boolean onQueryTextChange(String s) {
                mDashboardAdapter.getFilter().filter(s);
                return false;
            }
        });


        mEvents.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this,UpcomingEvents.class));
            }
        });
        
        
        displayInfo();
    }

    private void displayInfo() {
        mFetchInfo.loadGroups("groups").enqueue(new Callback<List<groups>>() {
            @Override
            public void onResponse(Call<List<groups>> call, Response<List<groups>> response) {
                List<groups> mgroups = response.body();
                mDashboardAdapter = new DashboardAdapter(getBaseContext(),mgroups);
                mDashboardAdapter.notifyDataSetChanged();
                dashboardRecycler.setAdapter(mDashboardAdapter);
            }

            @Override
            public void onFailure(Call<List<groups>> call, Throwable t) {

            }
        });
    }


}
