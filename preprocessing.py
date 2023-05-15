# Import required libraries(OpenCV, NumPy, Pandas, Matplotlib, TensorFlow, os, csv, globe)
import os
import cv2
import csv
import glob
import datetime
import numpy as np
import pandas as pd
import tensorflow as tf
import matplotlib.pyplot as plt

from PIL import Image

# Reading the image
image = cv2.imread(
    '/Users/ransisathsarani/Documents/IIT/Rice-Seed-Identification-System/laravel/public/image/new_image.jpg')

# Crop the center of the image using TenserFlow (Fraction = 90%)
cropped_img = tf.image.central_crop(image, central_fraction=0.9).numpy()

# Resizing the image
resized_img = cv2.resize(cropped_img, (600, 400))

# Converting the image to grayscale
gray_img = cv2.cvtColor(resized_img, cv2.COLOR_BGR2GRAY)

# Converting the image to HSV color space
hsv = cv2.cvtColor(resized_img, cv2.COLOR_BGR2HSV)

# Applying thresholding (Otsu's thresholding)
ret, thresh_img = cv2.threshold(
    gray_img, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)

# Morphological operations
kernel = np.ones((3, 3), np.uint8)
morph_img = cv2.erode(thresh_img, kernel, iterations=1)
morph_img = cv2.dilate(morph_img, kernel, iterations=1)

# Feature extraction
canny_edges = cv2.Canny(morph_img, threshold1=30, threshold2=100)
contours, hierarchy = cv2.findContours(
    canny_edges, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

# Get the count of contours
count = len(contours)
print('Count of contours:', count)
print('----------------------------')

# Initialize variables
total_area = 0
total_perimeter = 0
lengths = []
widths = []
areas = []
perimeters = []
numeric_hex_codes = []
hues = []
saturations = []
values = []
number_of_vertices = []

# Loop through the contours and compute their area and perimeter
for contour in contours:

    # Get the minimum area rectangle that bounds the contour (Pixel Units - number of pixels in the width and height of the bounding rectangle)
    rect = cv2.minAreaRect(contour)

    # Extract the length and width of the rectangle
    length, width = rect[1]

    # Print the length and width
    print('Length:', length)
    print('Width:', width)

    area = cv2.contourArea(contour)
    perimeter = cv2.arcLength(contour, True)

    # Appending the calculated length, width, area and perimiter to separate lists
    lengths.append(length)
    widths.append(width)
    areas.append(area)
    perimeters.append(perimeter)

    print('Area:', area)
    print('Perimeter:', perimeter)

    total_area += area
    total_perimeter += perimeter

    # Creating multiple masks using cv2 boundingrect
    x, y, w, h = cv2.boundingRect(contour)
    masked_img = cv2.rectangle(resized_img, (x, y), (x+w, y+h), (0, 255, 0), 2)

    # Creates a black image with the same size as the grayscale image
    mask = np.zeros_like(gray_img)
    # Draws the contour on the mask image using a white color
    cv2.drawContours(mask, [contour], 0, (255, 255, 255), -1)
    # Compute the mean color value of the pixels inside the contour
    mean_color = cv2.mean(gray_img, mask=mask)[:3]

    # Convert BGR to RGB (Red, Green, Blue)
    mean_color = tuple(reversed(mean_color))

    # Convert to integer format
    rgb_int = tuple(int(round(x * 255)) for x in mean_color)

    # Convert to hexadecimal format
    hex_code = '#{0:02x}{1:02x}{2:02x}'.format(*rgb_int)

    # Remove '#' from the hex code
    hex_code_without_hash = hex_code[1:]

    # Convert hex to numeric value
    hex_numeric_value = int(hex_code_without_hash, 16)

    # Appending the calculated hex_numeric_value to a list named numeric_hex_codes.
    numeric_hex_codes.append(hex_numeric_value)

    print('Mean Color:', mean_color)

    print('Hex Code:', hex_code)

    print('Numeric value of Hex Code:', hex_numeric_value)

    # Create a binary mask from the contour
    mask = np.zeros_like(hsv[:, :, 0])
    cv2.drawContours(mask, [contour], 0, 255, -1)

    # Compute the average HSV color value of the pixels inside the contour
    hue = np.mean(hsv[:, :, 0][mask == 255])
    saturation = np.mean(hsv[:, :, 1][mask == 255])
    value = np.mean(hsv[:, :, 2][mask == 255])

    hues.append(hue)
    saturations.append(saturation)
    values.append(value)

    # Print the HSV color values
    print('Hue:', hue)
    print('Saturation:', saturation)
    print('Value:', value)

    # Calculate the contour shape (Ex: (43, 1, 2) means (number of points in the contour, number of "rows" in each point, number of "columns" in each point))
    contour_shape = contour.shape

    # Get the number of vertices or points in the contour (Ex: 43)
    num_vertices = contour.shape[0]

    # Appending the calculated num_vertices to a list named number_of_vertices.
    number_of_vertices.append(num_vertices)

    print('Shape:', contour_shape)

    print('Number of Vertics:', num_vertices, '\n')

# Convert the length, width, area, perimeter, color, shape, etc.. lists to a pandas DataFrame
df = pd.DataFrame({'length': lengths, 'width': widths, 'area': areas, 'perimeter': perimeters, 'numeric_hex_code': numeric_hex_codes,
                  'hue': hues,  'saturation': saturations, 'value': values, 'number_of_vertices': number_of_vertices})

# Save the DataFrame to a CSV file with a unique file name
csv_file_name = "new_seed_data.csv"

if os.path.exists(csv_file_name):
    os.remove(csv_file_name)

df.to_csv(csv_file_name, index=False)
