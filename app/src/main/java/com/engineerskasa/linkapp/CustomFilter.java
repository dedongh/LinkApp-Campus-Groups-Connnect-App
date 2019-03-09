package com.engineerskasa.linkapp;

import android.widget.Filter;

import com.engineerskasa.linkapp.Adapter.DashboardAdapter;
import com.engineerskasa.linkapp.Models.groups;

import java.util.ArrayList;
import java.util.List;

public class CustomFilter extends Filter{

    DashboardAdapter mDashboardAdapter;
    List<groups> mGroupsCF;

    public CustomFilter(DashboardAdapter dashboardAdapter, List<groups> groups) {
        mDashboardAdapter = dashboardAdapter;
        mGroupsCF = groups;
    }

    @Override
    protected FilterResults performFiltering(CharSequence charSequence) {
        FilterResults filterResults = new FilterResults();
        if(charSequence != null && charSequence.length() >  0)
        {
            charSequence = charSequence.toString().toUpperCase();

            List<groups> filteredGroups = new ArrayList<>();

            for(int i=0;i<mGroupsCF.size();i++){
                if(mGroupsCF.get(i).getGroupName().toUpperCase().contains(charSequence))
                {
                    filteredGroups.add(mGroupsCF.get(i));
                }
            }

            filterResults.count = filteredGroups.size();
            filterResults.values = filteredGroups;
        }else{
            filterResults.count = mGroupsCF.size();
            filterResults.values = mGroupsCF;
        }
        return filterResults;
    }

    @Override
    protected void publishResults(CharSequence charSequence, FilterResults filterResults) {
        mDashboardAdapter.mGroupsList = (List<groups>) filterResults.values;
        mDashboardAdapter.notifyDataSetChanged();
    }
}
