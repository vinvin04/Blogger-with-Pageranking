#!C:/Program Files/Python37/python.exe
#print("Content-Type: text/html\n")
#print ("pagerank")


# -*- coding: utf-8 -*-
"""
Created on Thu Oct 17 21:28:46 2019

@author: Vinith Reddy
"""
print("JHSGDF")
import json
import networkx as nx
import matplotlib.pyplot as plt

input_file = open ('C:/xampp/htdocs/cms/data.json')
json_array = json.load(input_file)
#print(json_array)

e=[]
for item in json_array:
    e.append((item['postid'],item['outedge']))
    #print(item['postid'])
    #print(item['outedge'])
#print(e)
    
#pageranking
g=nx.DiGraph()
g.add_edges_from(e)
nx.draw(g,with_labels=True)
fig="graph"

#saving graph as png
plt.savefig(fig, dpi=None, facecolor='w', edgecolor='w',
        orientation='portrait', papertype=None, format=None,
        transparent=False, bbox_inches=None, pad_inches=0.1,
        frameon=None, metadata=None)
plt.show()
pr=nx.pagerank(g)
pr_sorted=sorted(pr.items(),key=lambda x:x[1],reverse=True)
ranks=[]
for i in pr_sorted:
    ranks.append(i[0])
print(ranks)

for i in range(0,len(ranks)):
    ranks[i]=int(ranks[i])
    
#writing to json file

with open('ranks.json', 'w') as outfile:
    json.dump(ranks, outfile) 
print("hsd")