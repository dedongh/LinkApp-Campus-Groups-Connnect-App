package com.engineerskasa.linkapp.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.engineerskasa.linkapp.MainEvent;
import com.engineerskasa.linkapp.Models.events;
import com.engineerskasa.linkapp.R;
import com.squareup.picasso.Picasso;

import java.util.List;

class EventsDashboardViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

    TextView eventName;
    TextView eventgroup;
    ItemClickListener mItemClickListener;
    ImageView eventPic;

    public EventsDashboardViewHolder(View itemView) {
        super(itemView);
        eventgroup = (TextView)itemView.findViewById(R.id.eventgroup);
        eventName = (TextView)itemView.findViewById(R.id.eventname);
        eventPic = (ImageView)itemView.findViewById(R.id.eventimage);
        itemView.setOnClickListener(this);
    }

    public void setItemClickListener(ItemClickListener itemClickListener) {
        mItemClickListener = itemClickListener;
    }

    @Override
    public void onClick(View view) {
        mItemClickListener.onClick(view,getAdapterPosition(),false);
    }

}

public class EventsDashboard extends RecyclerView.Adapter<EventsDashboardViewHolder>{

    private Context mContext;
    List<events> mEventsList;

    public EventsDashboard(Context context, List<events> eventsList) {
        mContext = context;
        mEventsList = eventsList;
    }

    @NonNull
    @Override
    public EventsDashboardViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View v = inflater.inflate(R.layout.dashboard_event,parent,false);
        return new EventsDashboardViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull EventsDashboardViewHolder holder, int position) {
        final events eventItem = mEventsList.get(position);

        holder.eventName.setText(eventItem.getEventName());
        holder.eventgroup.setText("By "+eventItem.getGroupName());
        Picasso
                .with(mContext)
                .load(eventItem.getIcon())
                .into(holder.eventPic);

        holder.setItemClickListener(new ItemClickListener() {
            @Override
            public void onClick(View view, int position, boolean isLongClick) {
                Intent intent = new Intent(mContext, MainEvent.class);
                intent.putExtra("id",eventItem.getId());
                view.getContext().startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mEventsList.size();
    }
}
