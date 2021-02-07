# GAN-based shoe image generator web-app

The web-application contains two GANs. While the DCGAN's output is generated solely from random seeds, the cGAN's output is regulated by sketching a shoe's edges.

## DCGAN-Application:
Users are presented an empty sketchpad. After pushing the “Generator”-button, the GAN’s generator generates a sample of 4 images and saves them to a previously specified database. When the process is completed, the buttons “Zeigen” and “Neu” pop up. “Zeigen” retrieves and immediately displays the generated sample from the database without page reload. “Neu” deletes the displayed images from the sketchpad.

![dcg](https://user-images.githubusercontent.com/76814718/106265499-6a346f80-6227-11eb-8bed-3c1899cdd1b0.png)

## cGAN-Application:
Users are presented an empty sketchpad (responsive to touch- and mouse-input). Prior to generating an image, users have to draw a sketch or use one of two editable design-patterns. By clicking the “Generator”-button, the cGAN’s generator processes the conditioned input and generates a sample with shapes based on the sketched user input.

![cgan](https://user-images.githubusercontent.com/76814718/106265494-67397f00-6227-11eb-848d-16fbaeedf048.png)
