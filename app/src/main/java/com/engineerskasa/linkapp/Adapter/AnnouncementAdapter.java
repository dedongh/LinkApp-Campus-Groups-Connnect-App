package com.engineerskasa.linkapp.Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.engineerskasa.linkapp.Models.announcement;
import com.engineerskasa.linkapp.R;
import com.ms.square.android.expandabletextview.ExpandableTextView;

import java.util.List;

class AnnouncementViewHolder extends RecyclerView.ViewHolder{

    TextView title,timestastamp;
    ExpandableTextView announcement;

    public AnnouncementViewHolder(View itemView) {
        super(itemView);

        title = (TextView)itemView.findViewById(R.id.title);
        timestastamp = (TextView)itemView.findViewById(R.id.timestamp);
        announcement = (ExpandableTextView)itemView.findViewById(R.id.expand_text_view);
    }
}

public class AnnouncementAdapter extends RecyclerView.Adapter<AnnouncementViewHolder> {
    private Context mContext;
    List<announcement> mAnnouncements;

    public AnnouncementAdapter(Context context, List<announcement> announcements) {
        mContext = context;
        mAnnouncements = announcements;
    }

    @NonNull
    @Override
    public AnnouncementViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View v = inflater.inflate(R.layout.single_announcement,parent,false);
        return new AnnouncementViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull AnnouncementViewHolder holder, int position) {
        final announcement announcement = mAnnouncements.get(position);

        holder.title.setText(announcement.getTitle());
        holder.announcement.setText(announcement.getDescription());
        holder.timestastamp.setText(announcement.getDate());

    }

    @Override
    public int getItemCount() {
        return mAnnouncements.size();
    }
}
