from sklearn.neighbors import KNeighborsClassifier

# Data Set 1
query1 = [[5, 2]]
training_set1 = [[2, 3, 'A'], [4, 2, 'A'], [1, 1, 'B'], [6, 5, 'B'], [4, 4, 'A'], [2, 2, 'B'], [1, 3, 'A']]
k1 = 3

# Data Set 2
query2 = [[42, 420]]
training_set2 = [[40, 400, 'A'], [45, 450, 'A'], [50, 500, 'B'], [35, 300, 'B'], [42, 400, 'A'], [38, 350, 'B'], [39, 380, 'A']]
k2 = 3

# Data Set 3
query3 = [[8, 8, 8, 8]]
training_set3 = [[7, 8, 7, 8, 'A'], [8, 9, 7, 7, 'B'], [9, 7, 9, 8, 'B'], [8, 8, 8, 9, 'B'], [7, 7, 8, 8, 'A'], [9, 8, 7, 7, 'A'], [8, 7, 8, 8, 'B']]
k3 = 7

# Fungsi untuk melakukan klasifikasi KNN
def knn_classification(query, training_set, k):
    X = [data[:-1] for data in training_set]
    y = [data[-1] for data in training_set]
    knn = KNeighborsClassifier(n_neighbors=k)
    knn.fit(X, y)
    return knn.predict(query)

# Melakukan klasifikasi KNN untuk setiap query
result1 = knn_classification(query1, training_set1, k1)
result2 = knn_classification(query2, training_set2, k2)
result3 = knn_classification(query3, training_set3, k3)

# Menampilkan hasil
print("Hasil Query 1:", result1[0])
print("Hasil Query 2:", result2[0])
print("Hasil Query 3:", result3[0])
