package com.engineerskasa.linkapp.Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.engineerskasa.linkapp.Models.Meetings;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.R;

import java.util.List;

class groupMeetingsViewHolder extends RecyclerView.ViewHolder{

    TextView meetingTime,meetingday,meetingVenue;

    public groupMeetingsViewHolder(View itemView) {
        super(itemView);
        meetingday = (TextView)itemView.findViewById(R.id.idmeetingdaysofselectedgrp);
        meetingTime = (TextView)itemView.findViewById(R.id.idmeetingtimeofselectedgrp);
        meetingVenue = (TextView)itemView.findViewById(R.id.idmeetingvenueofselectedgrp);
    }
}

public class GroupMeetingDays extends RecyclerView.Adapter<groupMeetingsViewHolder> {

    private Context mContext;
    List<Meetings> mMeetings;

    public GroupMeetingDays(Context context, List<Meetings> meetings) {
        mContext = context;
        mMeetings = meetings;
    }

    @NonNull
    @Override
    public groupMeetingsViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View v = inflater.inflate(R.layout.meeting_days,parent,false);
        return new groupMeetingsViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull groupMeetingsViewHolder holder, int position) {
        final Meetings meetings = mMeetings.get(position);

        holder.meetingday.setText(meetings.getDay());
        holder.meetingVenue.setText(meetings.getVenue());
        holder.meetingTime.setText(meetings.getTime());
    }

    @Override
    public int getItemCount() {
        return mMeetings.size();
    }
}
