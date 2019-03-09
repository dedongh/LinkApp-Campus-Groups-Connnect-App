package com.engineerskasa.linkapp.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Filter;
import android.widget.Filterable;
import android.widget.ImageView;
import android.widget.TextView;

import com.engineerskasa.linkapp.CustomFilter;
import com.engineerskasa.linkapp.MainGroup;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.R;
import com.squareup.picasso.Picasso;

import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.List;

class dashboardViewholder extends RecyclerView.ViewHolder implements View.OnClickListener{

    TextView groupName;
    ImageView groupLogo;
    ItemClickListener mItemClickListener;
    CardView mCardView;

    public dashboardViewholder(View itemView) {
        super(itemView);
        groupName = (TextView)itemView.findViewById(R.id.group_name1);
        groupLogo = (ImageView)itemView.findViewById(R.id.icon_group1);
        mCardView = (CardView)itemView.findViewById(R.id.group);
        mCardView.setOnClickListener(this);
    }

    public void setItemClickListener(ItemClickListener itemClickListener) {
        mItemClickListener = itemClickListener;
    }

    @Override
    public void onClick(View view) {
        mItemClickListener.onClick(view,getAdapterPosition(),false);
    }
}
public class DashboardAdapter extends RecyclerView.Adapter<dashboardViewholder> implements Filterable {
    private Context mContext;
    public List<groups> mGroupsList;
    List<groups> mFilteredGroupsList;
    CustomFilter filter;

    public DashboardAdapter(Context context, List<groups> groupsList) {
        mContext = context;
        mGroupsList = groupsList;
        mFilteredGroupsList = groupsList;
    }

    @NonNull
    @Override
    public dashboardViewholder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View v = inflater.inflate(R.layout.dashboard_group,parent,false);
        return new dashboardViewholder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull dashboardViewholder holder, int position) {

        final groups mgroups = mGroupsList.get(position);

        holder.groupName.setText(mgroups.getGroupName());
        Picasso
                .with(mContext)
                .load(mgroups.getIcon())
                .into(holder.groupLogo);

        holder.setItemClickListener(new ItemClickListener() {
            @Override
            public void onClick(View view, int position, boolean isLongClick) {
                Intent intent = new Intent(mContext, MainGroup.class);
                intent.putExtra("g_id",mgroups.getG_id());
                view.getContext().startActivity(intent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return mGroupsList.size();
    }

    @Override
    public Filter getFilter() {
        if(filter==null)
        {
            filter=new CustomFilter(this, mFilteredGroupsList);
        }

        return filter;
    }
}
