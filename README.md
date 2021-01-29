The web-application contains two GANs. While the DCGAN's output is generated from random seeds, the cGAN's output is regulated by sketching a shoe's edges.

## DCGAN-Application:
Users are presented an empty sketchpad. After pushing the “Generator”-button, the GAN’s generator generates a sample of 4 images and saves them to a previously specified database. When the process is completed, the buttons “Zeigen” and “Neu” pop up. “Zeigen” retrieves and immediately displays the generated sample from the database without page reload. “Neu”
deletes the displayed images.



## cGAN-Application:
Users are presented an empty sketchpad. Prior to generating an image, users have to draw a sketch or use one of two editable design-patterns. By clicking the “Generator”-button, the cGAN’s generator processes the conditioned input and generates a sample with shapes based on the sketched user input.
