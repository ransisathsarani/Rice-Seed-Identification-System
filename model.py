
import pandas as pd
from sklearn.svm import SVC
from sklearn.impute import SimpleImputer
from sklearn.metrics import accuracy_score
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from statistics import mode

# Load the CSV file
data = pd.read_csv(
    '/Users/ransisathsarani/Documents/IIT/Rice-Seed-Identification-System/csv/model_data.csv')

# Replace 0 values with the mean value of the feature
imputer = SimpleImputer(missing_values=0, strategy='mean')
data[['length', 'width', 'area', 'perimeter', 'numeric_hex_code', 'hue', 'saturation', 'value', 'number_of_vertices']] = imputer.fit_transform(
    data[['length', 'width', 'area', 'perimeter', 'numeric_hex_code', 'hue', 'saturation', 'value', 'number_of_vertices']])

# Split the data into features (X) and target (y)
X = data[['length', 'width', 'area', 'perimeter', 'numeric_hex_code',
          'hue', 'saturation', 'value', 'number_of_vertices']]
y = data['class']

# Split the data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42)

# Scale the features to have zero mean and unit variance
scaler = StandardScaler()
X_train = scaler.fit_transform(X_train)
X_test = scaler.transform(X_test)

# Initialize an SVM classifier with an RBF kernel and adjusted hyperparameters
svm = SVC(kernel='rbf', C=10, gamma=0.1)

# Train the SVM classifier
svm.fit(X_train, y_train)

# Predict the target values for the test set
y_pred = svm.predict(X_test)

# Calculate the accuracy of the classifier
accuracy = accuracy_score(y_test, y_pred) * 100
print('Accuracy:', accuracy, '%')

# Load a new CSV file containing the features of a new rice seed
new_data = pd.read_csv(
    '/Users/ransisathsarani/Documents/IIT/Rice-Seed-Identification-System/laravel/public/new_seed_data.csv')

# Replace 0 values with the mean value of the feature
new_data[['length', 'width', 'area', 'perimeter', 'numeric_hex_code', 'hue', 'saturation', 'value', 'number_of_vertices']] = imputer.transform(
    new_data[['length', 'width', 'area', 'perimeter', 'numeric_hex_code', 'hue', 'saturation', 'value', 'number_of_vertices']])

# Scale the features of the new data
new_data = scaler.transform(new_data)

# Predict the target value for the new data
predicted_class = svm.predict(new_data)

# Print the predicted class of the new data
print('Predicted class:', predicted_class)

most_frequent_value = mode(predicted_class)

print(most_frequent_value)
