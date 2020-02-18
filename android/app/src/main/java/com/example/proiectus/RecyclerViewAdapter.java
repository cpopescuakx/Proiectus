package com.example.proiectus;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.ViewHolder> {
    private static final String TAG = "RecyclerViewAdapter";



    private ArrayList<String> idInsti = new ArrayList<>();
    private ArrayList<String> nomInsti = new ArrayList<>();
    private ArrayList<String> codiInsti = new ArrayList<>();
    private ArrayList<String> ciutatInsti = new ArrayList<>();
    private Context contextInsti;

    public RecyclerViewAdapter( Context contextInsti, ArrayList<String> idInsti, ArrayList<String> nomInsti, ArrayList<String> codiInsti, ArrayList<String> ciutatInsti) {
        this.contextInsti = contextInsti;
        this.idInsti = idInsti;
        this.nomInsti = nomInsti;
        this.codiInsti = codiInsti;
        this.ciutatInsti = ciutatInsti;
    }


    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.layout_listitem, parent, false);
        ViewHolder holder = new ViewHolder((view));
        return holder;

    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
//        Log.d(TAG, msg:"onBindViewHolder: called.");
        holder.idInsti.setText(idInsti.get(position));
        holder.nomInsti.setText(nomInsti.get(position));
        holder.codiInsti.setText(codiInsti.get(position));
        holder.ciutatInsti.setText(ciutatInsti.get(position));

    }

    @Override
    public int getItemCount() {
        return idInsti.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView idInsti;
        TextView nomInsti;
        TextView codiInsti;
        TextView ciutatInsti;
        RelativeLayout parent_layout;



        public ViewHolder(View itemView) {
            super(itemView);
            idInsti = itemView.findViewById(R.id.idInsti);
            nomInsti = itemView.findViewById(R.id.nomInsti);
            codiInsti = itemView.findViewById(R.id.codiInsti);
            ciutatInsti = itemView.findViewById(R.id.ciutatInsti);
            parent_layout = itemView.findViewById(R.id.parent_layout);

        }
    }
}
