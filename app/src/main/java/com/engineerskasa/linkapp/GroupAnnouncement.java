package com.engineerskasa.linkapp;

import android.content.Context;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.engineerskasa.linkapp.Adapter.AnnouncementAdapter;
import com.engineerskasa.linkapp.Adapter.DashboardAdapter;
import com.engineerskasa.linkapp.Models.announcement;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.Remote.RetrofitClient;

import java.util.Collection;
import java.util.Collections;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class GroupAnnouncement extends Fragment {
    RecyclerView announcementRecycler;
    AnnouncementAdapter mAnnouncementAdapter;
    FetchInfo mFetchInfo;
    String id;
    public GroupAnnouncement() {
        // Required empty public constructor
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View v = inflater.inflate(R.layout.fragment_group_announcement, container, false);

        announcementRecycler = (RecyclerView)v.findViewById(R.id.announcementRecycler);
        announcementRecycler.setLayoutManager(new LinearLayoutManager(getActivity()));
        mFetchInfo = RetrofitClient.getAPIService();
        if(getActivity().getIntent() != null)
        {
            id = getActivity().getIntent().getStringExtra("g_id");
            displayAnnouncement(id);
        }
        return v;
    }

    private void displayAnnouncement(String id) {
        mFetchInfo.loadGroupAnnouncemnet(id).enqueue(new Callback<List<announcement>>() {
            @Override
            public void onResponse(Call<List<announcement>> call, Response<List<announcement>> response) {
                List<announcement> mannouncements = response.body();
                Collections.reverse(mannouncements);
                mAnnouncementAdapter = new AnnouncementAdapter(getActivity(),mannouncements);
                mAnnouncementAdapter.notifyDataSetChanged();
                announcementRecycler.setAdapter(mAnnouncementAdapter);
            }

            @Override
            public void onFailure(Call<List<announcement>> call, Throwable t) {

            }
        });
    }


}
