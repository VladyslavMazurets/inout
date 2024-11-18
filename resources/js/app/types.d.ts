import { UploadedFile } from "craftable-pro/types";

export type Course = {
  id: string | number;
  title: string;
  slug: string;
  description: string;
  price: number;
  discount: number;
  duration: number;
  instructors: Instructor[];
  testimonials: Testimonial[];
  content: string;
  created_at: string;
  updated_at: string;
  deleted_at: string;
  media?: UploadedFile[];
};

export type Instructor = {
  id: string | number;
  first_name: string;
  last_name: string;
  slug: string;
  description: string;
  position: string;
  instagram_link: string;
  telegram_link: string;
  custom_link: string;
  created_at: string;
  updated_at: string;
  media?: UploadedFile[];
};

export type Testimonial = {
  id: string | number;
  name: string;
  position: string;
  rating: number;
  content: string;
  custom_link: string;
  date: Date;
  created_at: string;
  updated_at: string;
  media?: UploadedFile[];
};
