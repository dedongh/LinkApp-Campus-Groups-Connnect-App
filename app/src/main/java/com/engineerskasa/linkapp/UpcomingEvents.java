package com.engineerskasa.linkapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import com.engineerskasa.linkapp.Adapter.DashboardAdapter;
import com.engineerskasa.linkapp.Adapter.EventsDashboard;
import com.engineerskasa.linkapp.Models.events;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.Remote.RetrofitClient;

import java.util.Collection;
import java.util.Collections;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class UpcomingEvents extends AppCompatActivity {

    RecyclerView mRecyclerView;
    EventsDashboard mEventsDashboard;
    FetchInfo mFetchInfo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_upcoming_events);


        mRecyclerView = (RecyclerView)findViewById(R.id.eventsRecycler);
        mRecyclerView.setLayoutManager(new LinearLayoutManager(this, LinearLayoutManager.VERTICAL,false));
        mRecyclerView.setItemAnimator(new DefaultItemAnimator());

        mFetchInfo = RetrofitClient.getAPIService();

        displayEvents();
    }

    private void displayEvents() {
        mFetchInfo.loadEvents("events").enqueue(new Callback<List<events>>() {
            @Override
            public void onResponse(Call<List<events>> call, Response<List<events>> response) {
                List<events> mevents = response.body();
                Collections.reverse(mevents);
                mEventsDashboard = new EventsDashboard(getBaseContext(),mevents);
                mEventsDashboard.notifyDataSetChanged();
                mRecyclerView.setAdapter(mEventsDashboard);
            }

            @Override
            public void onFailure(Call<List<events>> call, Throwable t) {

            }
        });
    }

}
